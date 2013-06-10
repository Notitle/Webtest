<?php

/**
 * Main class
 * @author Loic
 */
class Application
{

    private $dao_factory;

    /**
     * L'application lancée
     * @var Application
     */
    private static $app;

    /**
     * L'utilisateur courrant connecté
     * @var Utilisateur_metier
     */
    private $currUser;

    /**
     * Le tableau de configuration générale
     * @var Array 
     */
    private $config;

    /**
     * Le tableau des permissions
     * @var Array 
     */
    private $permissions;

    /**
     *  L'utilisateur courant. 
     * @var Utilisateur_metier
     */
    private static $curr_user;

    private function __construct()
    {
        if (!isset(self::$app))
        {
            self::$app = $this;
        }
    }

    /**
     * Fonction de configuration de l'application
     * @param Array $url - Tableau d'url de la config
     * @return type
     */
    public static function config($url)
    {
        new Application();
        require_once $url;
        self::$app->config = &$config;
        require_once self::$app->config['PATH']['base'] . "/" . self::$app->config['PATH']['utils'] . '/Autoloader.php';
        return self::$app;
    }

    /**
     * Lance l'application
     */
    public function run()
    {
        $a = new Autoloader(self::$app->config['PATH']);
        session_start();
        session_regenerate_id(true);
        self::$app->dao_factory = new DAO_factory(Application::getConfigDb());
        $query = isset($_GET['query']) ? $_GET['query'] : "";
        $rs = new RouteSolver_utils($query);
        self::$app->currUser = User_manager::createUserFromSession();

        $controller = $rs->getController();
        $action = $rs->getAction();
        $controller->$action($rs->getParams());
    }

    /**
     * Retourne la config DB
     * @return Array
     */
    public static function getConfigDb()
    {
        return self::$app->config['DB'];
    }

    /**
     * Retourne la config des URL
     * @return Array
     */
    public static function getConfigPath()
    {
        return self::$app->config['PATH'];
    }

    /**
     * Retourne la configuration MVC
     * @return Array
     */
    public static function getConfigMVC()
    {
        return self::$app->config['MVC'];
    }

    /**
     * Retourne les permissions
     * @return Array
     */
    public static function getPermissions()
    {
        return self::$app->permissions;
    }

    /**
     * 
     * @return DAO_factory
     */
    public static function getDAOFactory()
    {
        return self::$app->dao_factory;
    }

    /**
     * Retourne l'utilisateur courrant
     * @return Utilisateur_metier
     */
    public static function getCurrUser()
    {
        return self::$app->currUser;
    }

}

?>
