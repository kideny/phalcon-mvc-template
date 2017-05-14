<?php
/**
* DragonPHP : Delightfully simple forum software
*
* Licensed under The GNU License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @link    http://DragonPHP.com DragonPHP Project
* @since   1.0.0
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
*/

namespace DragonPHP\Backend\Forms;

use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\Check;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Identical;
use Phalcon\Validation\Validator\StringLength;
use DragonPHP\Backend\Models\UserGroups;

class UsersForm extends FormBase
{

    /**
     * Forms initializer
     *
     * @param Users $user
     * @param array $options
     */
    public function initialize($entity = null, $options = null)
    {

        // In edition the id is hidden
        if (isset($options['edit']) && $options['edit']) {

            $id = new Hidden('id');

        } else {

            $id = new Text('id',[
                'class'  => 'form-control',
            ]);

        }

        $this->add($id);

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

        // email
        $email = new Text('email', [
            'class'  => 'form-control',
            "maxlength"  => 50,
            'placeholder'  =>  '请输入电子邮件',
            'required'  =>  'true',
            'autofocus'  =>  'true'
        ]);

        $email->setLabel('E-mail');

        $email->addValidators([
            new PresenceOf(
                [
                    'message' => 'E-mail是必须要填写的'
                ]
            ),
            new Email(
                [
                    'message' => '请输入有效的电子邮件地址'
                ]
            )
        ]);

        // Set one filter
        $email->setFilters(
            "email"
        );

        $this->add($email);

        // FirstName
        $firstName = new Text('firstName',
            [
                'class'  => 'form-control',
                'placeholder' => '请输入您的名',
                'required' => 'true',
            ]
        );

        $firstName->setLabel('First Name');

        // Set multiple filters
        $firstName->setFilters(
            [
                "string",
                "trim",
            ]
        );

        $this->add($firstName);

        // LastName
        $lastName = new Text('lastName',
            [
                'class'  => 'form-control',
                'placeholder' => '请输入您的姓',
                'required' => 'true',
            ]
        );
        $lastName->setLabel('Last Name');

        // Set multiple filters
        $lastName->setFilters(
            [
                "string",
                "trim",
            ]
        );

        $this->add($lastName);

        // Usergroups
        $userGroups = UserGroups::find([
            'isActivated = :active:',
            'bind' => [
                'active' => '1'
            ]
        ]);

        // isSuperUser
        $isSuperUser = new Check('isSuperUser', [
            'value' => '1'
        ]);

        $isSuperUser->setLabel('是否超级管理员');

        $this->add($isSuperUser);

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
        $this->add(new Submit('submit',[
            'class' => 'btn btn-primary'
        ]));

    }

}