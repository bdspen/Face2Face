<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/User.php";
    require_once __DIR__."/../src/Place.php";

    $app = new Silex\Application();

    $app['debug']=true;

    define('DB_HOST', getenv('OPENSHIFT_MYSQL_DB_HOST'));
    define('DB_PORT',getenv('OPENSHIFT_MYSQL_DB_PORT'));
    define('DB_USER',getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
    define('DB_PASS',getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
    define('DB_NAME',getenv('OPENSHIFT_GEAR_NAME'));


    $server = 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT;;
    $username = 'adminREakaeE';
    $password = '4MFHL6g5eZta';
    $DB = new PDO($server, DB_USER, DB_PASS);

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
        $latitude = 45.516231;
        $longitude = -122.682519;
        $signed_in = true;

        $user = new User($user_name, $password, $longitude, $latitude, $signed_in, $id=null);
        $user->save();

        return $app['twig']->render('users.html.twig', array('user' => $user, 'avialable_users' => $user->findUsersNear(), 'requests' => $user->findMeetupRequests()));
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
        $location = Place::setMeetupLocation($user1, $user2);
        $user1->addMeetUpRequest($user2->getId(), $location->getId());

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
                return $app['twig']->render('confirmed_user1.html.twig', array('user_to_meet' => $user2, 'user' => $user1, 'location' => $location));
            } else {
                return $app['twig']->render('rejected.html.twig', array('user' => $user1, 'user_to_meet' => $user2));
            }
        }
    });
    $app->post("/confirm_request", function() use ($app) {
        $user1 = User::find($_POST['user1_id']);
        $user2 = User::find($_POST['user2_id']);

        $user1->confirmMeetupRequest($user2->getId());
        $location = Place::getMeetUpLocation($user2->getId(), $user1->getId());
        return $app['twig']->render('confirmed_user2.html.twig', array('user_to_meet' => $user2, 'user' => $user1, 'location' => $location));
    });

    $app->post("/reject_request", function() use ($app) {
        $user1 = User::find($_POST['user1_id']);
        $user2 = User::find($_POST['user2_id']);

        $user1->rejectMeetupRequest($user2->getId());
        return $app['twig']->render('users.html.twig', array('user' => $user1, 'avialable_users' => $user1->findUsersNear(), 'requests' => $user1->findMeetupRequests()));
    });

    $app->post("/user1_confirm_meet", function() use ($app) {
        $user1 = User::find($_POST['user1_id']);
        $user2 = User::find($_POST['user2_id']);
        $user1->confirmMeetUserOne($user2->getId(), true);
        return $app['twig']->render('confirmation.html.twig', array('user' => $user1));
    });

    $app->post("/user2_confirm_meet", function() use ($app) {
        $user1 = User::find($_POST['user1_id']);
        $user2 = User::find($_POST['user2_id']);
        $user1->confirmMeetUserTwo($user2->getId(), true);
        return $app['twig']->render('confirmation.html.twig', array('user' => $user1));
    });

    $app->post("/user1_deny_meet", function() use ($app) {
        $user1 = User::find($_POST['user1_id']);
        $user2 = User::find($_POST['user2_id']);
        $user1->confirmMeetUserOne($user2->getId(), false);
        return $app['twig']->render('deny.html.twig', array('user' => $user1));
    });

    $app->post("/user2_deny_meet", function() use ($app) {
        $user1 = User::find($_POST['user1_id']);
        $user2 = User::find($_POST['user2_id']);
        $user1->confirmMeetUserTwo($user2->getId(), false);
        return $app['twig']->render('deny.html.twig', array('user' => $user1));
    });

    $app->get("go_home", function() use ($app) {
        $user = User::find($_GET['user1_id']);
        return $app['twig']->render('users.html.twig', array('user' => $user, 'avialable_users' => $user->findUsersNear(), 'requests' => $user->findMeetupRequests()));
    });
    return $app;
?>
