<?php


namespace App\Service\Logger;


use Psr\Log\LoggerInterface;

/**
 * Ce service permet d'obtenir un Logger utilisant le channel coconuts afin de logger dans les fichiers de logs correspondant
 * à ce channel.
 *
 * Class CoconutsLogger
 * @package \InvoiceBundle\Service\Logger
 *
 * @method string debug(string $string, array $params = null)
 * @method string info(string $string, array $params = null)
 * @method string notice(string $string, array $params = null)
 * @method string warning(string $string, array $params = null)
 * @method string error(string $string, array $params = null)
 * @method string critical(string $string, array $params = null)
 * @method string alert(string $string, array $params = null)
 * @method string emergency(string $string, array $params = null)
 *
 * Class CoconutsLogger
 * @package App\Services\Logger
 */
class CoconutsLogger
{
    /**
     * @var LoggerInterface
     */
    protected $_logger;

    /**
     * Liste des méthodes autorisées pour le logger
     * @var string[]
     */
    private $_availableMethods;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->_logger = $logger;
        $this->_availableMethods = ['debug', 'info', 'notice', 'warning', 'error', 'critical', 'alert', 'emergency'];
    }

    /**
     * Méthode MAGIQUE pour récupérer toutes les commandes du logger et les lui envoyer
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (!in_array($name, $this->_availableMethods)) {
            throw new \InvalidArgumentException("Wrong log method type: " . $name);
        }
        return call_user_func_array([$this->_logger, $name], $arguments);
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->_logger;
    }
}