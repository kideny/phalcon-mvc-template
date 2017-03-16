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
use Qaytmaydi\Tools\ZFunction;
use Qaytmaydi\Cli\Library\Output;

class UpdateTask extends Task
{
    /**
     * The task updated core Qaytmaydi
     *
     * @return mixed
     */
    public function mainAction()
    {
        Output::stdout('======================================================');
        Output::stdout('Loading Qaytmaydi repositories with package information');

        Output::stdout('Call function ZFunction::gitUpdate()');
        ZFunction::gitUpdate();

        Output::stdout('Qaytmaydi upgraded successfully');
        Output::stdout('======================================================');
    }
}
