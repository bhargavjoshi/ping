<?php 

namespace BhargavJoshi\Ping\Commands;

use BhargavJoshi\Ping\PingUrl;
use Illuminate\Console\Command;

class ForgeDeployCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'forge:deploy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deploy an project on forge.';

    public function __construct(PingUrl $pingUrl)
    {
        // Set configuration repository.
        $this->ping = $pingUrl;

        parent::__construct();
    }

    public function fire()
    {
        $url = env('forge_deploy_url', false);

        if($url){
            $success = $this->ping->ping($url);

            if($success){
                $this->info('Project Updated on forge.');
            } else {
                $this->error('There was some error deploying project on forge.');
            }
        } else {
            $this->error('forge deploy url not found in env file. set a deploy url with forge_deploy_url key in your .env file.');
        }
    }
}