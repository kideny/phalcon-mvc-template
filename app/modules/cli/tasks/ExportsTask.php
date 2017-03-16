<?php
/**
 * Qaytmaydi : Delightfully simple forum software
 *
 * Licensed under The GNU License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @link    http://Qaytmaydi.com Qaytmaydi Project
 * @since   1.0.0
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
 */
namespace Qaytmaydi\Cli\Tasks;

use Phalcon\CLI\Task;
use Qaytmaydi\Cli\Library\Output;

class ExportsTask extends Task
{
    /**
     * The task exports database Qaytmaydi
     *
     * {cmd}
     *    php cli Exports
     * {/cmd}
     *
     * @return mixed
     */
    public function mainAction()
    {
        Output::stdout('======================================================');
        Output::stdout('Starting exports your database');
        $mysql    = $this->config->database->mysql;
        $host     = $mysql->host;
        $database = $mysql->dbname;
        $username = $mysql->username;
        $password = $mysql->password;

        $name = $database . date('Y-m-d-H:i:s');
        $cmd  = "mysqldump -u $username --password=$password --host=$host $database > $name.sql";
        shell_exec($cmd);

        Output::stdout('Qaytmaydi exports your database successfully');
        Output::stdout('======================================================');
    }
}
