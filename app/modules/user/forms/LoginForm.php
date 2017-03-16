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

namespace Qaytmaydi\User\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\StringLength;

class LoginForm extends Form
{
    public function initialize()
    {
        // loginName
        $loginName = new Text('loginName', [
            'class'  => 'form-control',
            "maxlength"   => 30,
            'placeholder' => '请输入登录名',
            'required' => 'true'
        ]);

        $loginName->setLabel('LoginName');

        $loginName->addValidators([
            new PresenceOf(
                [
                    'message' => '登录名是必须要填写的！'
                ]
            ),
            new StringLength(
                [
                    "min"            => 5,
                    "messageMinimum" => "您的用户名太短了！",
                ]
            )
        ]);

        // Set multiple filters
        $loginName->setFilters(
            [
                "string",
                "trim",
            ]
        );

        $this->add($loginName);

        // Password
        $password = new Password('password', [
            'class'  => 'form-control',
            'required' => 'true',
            "autocomplete" => "off",
            'maxlengh' => 32,
            'placeholder' => '请输入密码'
        ]);

        $password->setLabel('Password');

        $password->addValidator(
            new PresenceOf([
                'message' => '密码是必须的',
            ])
        );

        $password->clear();

        $this->add($password);

        // Remember
        $remember = new Check('remember', [
            'value' => 'yes'
        ]);

        $remember->setLabel('Remember me');

        $this->add($remember);

        // CSRF
        $csrf = new Hidden('csrf');

        $csrf->addValidator(
            new Identical(
                [
                    'value' => $this->security->getSessionToken(),
                    'message' => 'CSRF 验证失败'
                ]
            )
        );

        $csrf->clear();

        $this->add($csrf);

        $this->add(new Submit('立即登陆', [
            'class' => 'btn btn-success'
        ]));
    }

}