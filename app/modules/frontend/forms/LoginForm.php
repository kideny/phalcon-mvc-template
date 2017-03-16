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

namespace Qaytmaydi\Frontend\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\StringLength;

class LoginForm extends Form
{
    public function initialize()
    {
        // Email
        $email = new Text('email', [
            'class' => 'form-control',
            "maxlength"  => 50,
            'placeholder'  =>  '请输入电子邮件',
            'required'  =>  'true',
            'autofocus'  =>  'true'
        ]);

        $email->setLabel('E-mail');

        $email->addValidators([
            new PresenceOf([
                'message' => 'E-mail是必须的'
            ]),
            new Email([
                'message' => '请输入有效的电子邮件地址'
            ])
        ]);

        // Set one filter
        $email->setFilters(
            "email"
        );

        $this->add($email);

        // Password
        $password = new Password('password', [
            'class' => 'form-control',
            'required' => 'true',
            "autocomplete" => "off",
            'maxlengh' => 32,
            'placeholder' => '请输入密码'
        ]);

        $password->setLabel('Password');

        $password->addValidators([
            new StringLength([
                'min' => 8,
                'messageMinimum' => '您输入的密码太短. 最小为8个字符'
            ]),
            new StringLength([
                'max' => 32,
                'messageMinimum' => '您输入的密码太长. 最大为32个字符'
            ]),
            new PresenceOf([
                'message' => '密码是必须的'
            ])
        ]);

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
            new Identical([
                'value' => $this->security->getSessionToken(),
                'message' => 'CSRF 验证失败'
            ])
        );

        $csrf->clear();
        $this->add($csrf);

        $this->add(new Submit('go', [
            'class' => 'btn btn-success'
        ]));
    }
}