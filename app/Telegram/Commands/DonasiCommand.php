<?php
namespace App\Telegram\Commands;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Commands\Command;
use Telegram;
/**
* Class DonasiCommand.
*/
class DonasiCommand extends Command
{
    /**
    * @var string Command Name
    */
    protected $name = 'Donasi';
    
    /**
    * @var array Command Aliases
    */
    protected $aliases = ['donasi'];
    /**
    * @var string Command Description
    */
    protected $description = 'Informasi terkait donasi Palestine Day 2025';
    /**
    * {@inheritdoc}
    */
    public function handle()
    {
        
       $response = $this->getUpdate();
       $chat_id = $response->getChat()->getId();
       $username = $response->getChat()->getFirstName();
     
       return $this->telegram->sendMessage([
           'chat_id' => $chat_id,
           'text' => 'Terimakasih ' .$username. ' sudah berkenan berdonasi untuk Palestine Day 2025, Tinggal selangkah lagi yang perlu dilakukan.🙏😊
           
Donasi ditransfer melalui rekening berikut :
Bank Syariah Indonesia (BSI)
7500 5000 63  
Atas Nama Sedekah Recehan
---
Semoga Allah SWT senantiasa memberikan kelancaran aktivitas untuk ' .$username. ' Sekeluarga.

Aamiin 🤲🤲🤲

"Palestine Day 2025"
**Menyalakan Cinta Palestina dalam Karya**',
       ]);
   }
}