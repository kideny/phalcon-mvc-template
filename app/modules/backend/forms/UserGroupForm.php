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
namespace Qaytmaydi\Backend\Forms;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\StringLength;

class UserGroupForm extends FormBase
{

    public function initialize()
    {

        // Name
        $name = new Text('name', [
            'class'  => 'form-control',
            "maxlength"   => 30,
            'placeholder' => '请输入用户组名',
            'required' => 'true'
        ]);

        $name->setLabel('Name');

        $name->addValidators([
            new PresenceOf(
                [
                    'message' => '用户组名是必须要填写的！'
                ]
            ),
            new StringLength(
                [
                    "min"            => 4,
                    "messageMinimum" => "您的用户组名太短了！",
                ]
            )
        ]);

        // Set multiple filters
        $name->setFilters(
            [
                "string",
                "trim",
            ]
        );

        $this->add($name);

        // code
        $code = new Text('code',
            [
                'class'  => 'form-control',
                'placeholder' => '请输入您的URL名',
                'required' => 'true',
            ]
        );

        $code->setLabel('Code');

        // Set multiple filters
        $code->setFilters(
            [
                "string",
                "trim",
            ]
        );

        $this->add($code);

        // description
        $description = new Text('description',
            [
                'class'  => 'form-control',
                'placeholder' => '请输入用户组名的描述',
                'required' => 'true',
            ]
        );

        $description->setLabel('Last Name');

        // Set multiple filters
        $description->setFilters(
            [
                "string",
                "trim",
            ]
        );

        $this->add($description);

        // isNewUserDefault
        $isNewUserDefault = new Check('isNewUserDefault',
            [
                'value' => '1'
            ]
        );

        $isNewUserDefault->setLabel('isNewUserDefault');

        $this->add($isNewUserDefault);

        // isActivated
        $isActivated = new Check('isActivated',
            [
                'value' => '1'
            ]
        );

        $isActivated->setLabel('isActivated');

        $this->add($isActivated);

        // CSRF
        $csrf = new Hidden('csrf');

        $csrf->addValidator(new Identical(
            [
                'value' => $this->security->getSessionToken(),
                'message' => 'CSRF 验证失败'
            ]
        ));

        $csrf->clear();

        $this->add($csrf);

        // Submit
        $this->add(new Submit('submit',
            [
                'class' => 'btn btn-primary'
            ]
        ));
    }


}