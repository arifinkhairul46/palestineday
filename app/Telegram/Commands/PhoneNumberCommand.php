<?php
namespace App\Telegram\Commands;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Commands\Command;
use Telegram;
/**
* Class PhoneNumberCommand.
*/
class PhoneNumberCommand extends Command
{
    /**
    * @var string Command Name
    */
    protected $name = 'phonenumber';
    
    /**
    * @var array Command Aliases
    */
    protected $aliases = ['my_phone_number'];
    /**
    * @var string Command Description
    */
    protected $description = 'Perintah untuk mendapatkan phone number user.';
    /**
    * {@inheritdoc}
    */
    public function handle()
    {
       $response = $this->getUpdate();
       $chat_id = $response->getChat()->getId();
       $btn = Keyboard::button([
           'text' => 'Share Phone Number',
           'request_contact' => true,
       ]);
       $keyboard = Keyboard::make([
           'keyboard' => [[$btn]],
           'resize_keyboard' => true,
           'one_time_keyboard' => true
       ]);
       
       return $this->telegram->sendMessage([
           'chat_id' => $chat_id,
           'text' => 'Silahkan tekan Share Phone Number kemudian share!',
           'reply_markup' => $keyboard
       ]);
   }
}