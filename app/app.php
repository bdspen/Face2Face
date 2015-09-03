<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/User.php";
    require_once __DIR__."/../src/Place.php";

    $app = new Silex\Application();

    $app['debug']=true;

    $server = 'mysql:host=localhost;dbname=face_to_face';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    //home page (sign up page)
    $app->get("/", function() use($app) {
        return $app['twig']->render('home.html.twig');
    });

    //after log off
    $app->get("/logoff/{id}", function($id) use($app) {
        $user = User::find($id);
        $user->logOut();
        return $app['twig']->render('home.html.twig');
    });

    //list of users page
        //after sign up
    $app->post("/signup", function() use($app) {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $retype_password = $_POST['retype_password'];
        $longitude = 45.516231;
        $latitude = -122.682519;
        $signed_in = true;

        $user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id=null);
        $user->save();

<<<<<<< HEAD
        return $app['twig']->render('users.html.twig', array('user' => $user, 'avialable_users' => $user->findUsersNear(), 'requests' => $user->findMeetupRequests()));
=======
        $user = User::find($id);

        return $app['twig']->render('users.html.twig', array("users" => User::getAll(), "requests" => $user->findMeetupRequests()));
>>>>>>> 2b92ae4222d5db968d6f8dfa0a68fa8b73a64e77
    });

    //log in page
    $app->get("/login", function() use($app) {
        return $app['twig']->render('login.html.twig');
    });
    
    $app->get("/logged_on", function() use ($app) {
        $user_name = $_GET['username'];
        $user = User::findByUserName($user_name);
        $user_logged = $user->logIn($user_name, $_GET['password']);
        if($user_logged == "Wrong Password") {
            return $app['twig']->render('login.html.twig');
        } else {
            return $app['twig']->render('users.html.twig', array('user' => $user_logged, 'avialable_users' => $user->findUsersNear(), 'requests' => $user->findMeetupRequests()));
        }
    });
    
    $app->post("/request_meetup", function() use ($app) {
        $user1 = User::find($_POST['user1_id']);
        $user2 = User::find($_POST['user2_id']);
        // $location = Place::setMeetupLocation($user1, $user2);
        $user1->addMeetUpRequest($user2->getId(), 1);
        
        return $app['twig']->render('waiting_to_confirm.html.twig', array('user1_id' => $user1->getId(), 'user2_id' => $user2->getId()));
    });

    //waiting for request respond page
    $app->get("/wait_for_confirmation", function() use ($app) {
        $user1 = User::find($_GET['user1_id']);
        $user2 = User::find($_GET['user2_id']);
        
        if(($user1->hasUserTwoConfirmed($user2->getId())) == NULL) {
            return $app['twig']->render('waiting_to_confirm.html.twig', array('user1_id' => $user1->getId(), 'user2_id' => $user2->getId()));
        } else {
            if(($user1->hasUserTwoConfirmed($user2->getId()))) {
                $location = Place::getMeetUpLocation($user1->getId(), $user2->getId());
                // $location = Place::find(1);
                return $app['twig']->render('confirmed.html.twig', array('user_to_meet' => $user2, 'user' => $user1, 'location' => $location));
            } else {
                return $app['twig']->render('rejected.html.twig', array('user' => $user1, 'user_to_meet' => $user2));
            }
        }
    });
    //meetup history page

    //directions page

    return $app;
?>
