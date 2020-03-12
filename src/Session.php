<?php
    /**
     * Ce fichier est une partie du Framework Ekolo
     * (c) Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Component\EkoSession;

    \session_start();

    use Ekolo\Component\EkoMagic\ParameterBag;

    /**
     * Gère les session
     */
    class Session extends ParameterBag {

        public function __construct(array $vars = [])
        {
            $_SESSION = !empty($vars) ? array_merge($_SESSION, $vars) : $_SESSION;
            parent::__construct($_SESSION);
        }

        /**
         * Permet de modifier la valeur d'une session
         * @param string $key La clé de la session
         * @param mixed $value la valeur
         * @return void
         */
        public function set($key, $value)
        {
            parent::set($key, $value);
            $_SESSION[$key] = $value;
        }

        /**
         * Permet d'ajouter un nouveau tableau de sessions
         * @param array $parameters Les paramètres à ajouter
         * @return void
         */
        public function add(array $parameters = [])
        {
            parent::add($parameters);
            $_SESSION = array_merge($_SESSION, $parameters);
        }

        /**
         * Remplace les variables se trouvant dans la session par des nouvelles
         * @param array $parameters
         * @return void
         */
        public function replace(array $parameters = [])
        {
            parent::replace($parameters);
            $_SESSION = $parameters;
        }

        /**
         * Supprime la variable de la session
         * @param string $key La clé de la variable à supprimer
         * @return void
         */
        public function remove($key)
        {
            parent::remove($key);
            unset($_SESSION[$key]);
        }

        /**
         * Retourne la variable dans la session
         * @param string $key La clé de la variable à retoruner
         * @return void
         */
        public function get($key, $default = null)
        {
            parent::get($key, $default);
            return $this->has($key) ? $_SESSION[$key] : null;
        }

        /**
         * Renvoi les clés des paramètres
         * @return array
         */
        public function keys()
        {
            parent::keys();
            return array_keys($_SESSION);
        }

        /**
         * Vérifie si le parameter existe
         * @param string $key
         * @return bool
         */
        public function has($key)
        {
            parent::has($key);
            return array_key_exists($key, $_SESSION);
        }

        /**
         * Retourne Le nombre de parameters
         * @return int
         */
        public function count()
        {
            parent::count();
            return \count($_SESSION);
        }

        /**
         * Retourne les variables
         * @return array
         */
        public function all()
        {
            parent::all();
            return $_SESSION;
        }
    }