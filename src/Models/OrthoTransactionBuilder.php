<?php

namespace Ortho\Laravel\Models;

// {"options" : [{"provider" : "mono-connect", "settings" : {"key" : "your_custom_key"}}, {"provider" : "remita-pay", "settings" : {"amount" : 10000}}]}
use Illuminate\Support\Arr;

class OrthoTransactionBuilder
{
    private array $options = [];
    public function getOptions()
    {
        return $this->options;
    }
    public function addMono(array $settings)
    {
        $this->updateOptions(['provider'=>"mono-connect", "settings"=>$settings]);
        return $this;
    }

    public function addRemita(array $settings)
    {

    }

    private function updateOptions(array $data)
    {
        $options = collect($this->options);
       if(!$options->contains('provider', $data['provider'])){
           $this->options[] = $data;
           return;
       }

       $newOptions = $options->map(function($item) use ($data){
          if($item['provider'] !== $data['provider']) return $item;
          return ['provider'=>$item['provider'], 'settings'=> [...$item['settings'], ...$data['settings']]];
       });

       $this->options = $newOptions->toArray();
    }
}
