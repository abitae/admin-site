<?php

namespace App\Livewire\Components;

use App\Models\Employee;
use App\Models\Negocio;
use Carbon\Carbon;
use Livewire\Component;

class ChartBarraLive extends Component
{
    public function render()
    {       
        $series = [           
            $this->serieChart("Abierto",'#9B0EEA','ABIERTO'),
            $this->serieChart("Perdido",'#FF0000','PERDIDO'),
            $this->serieChart("Ganado",'#00FF00','GANADO')
        ];
        $name = "name";
        $categories = $this->categoryChart();
        return view('livewire.components.chart-barra-live',compact('series','name','categories'));
    }
    public function dataChart(string $stage){
        $data = [];
        $date = Carbon::now('America/Lima');
        $mes = $date->month + 1;
        $year = $date->year;
        for ($i=1; $i <= 12 ; $i++) {
            if($mes - $i <= 0){
                array_push($data,Negocio::where('stage',$stage)->whereMonth('updated_at', $i )->whereYear('updated_at', $year-1)->count()); 
            }
        }
        for ($i=12; $i >= 1 ; $i--) {
            if($mes - $i > 0){
                array_push($data,Negocio::where('stage',$stage)->whereMonth('updated_at', ($mes - $i) )->whereYear('updated_at', $year)->count()); 
            }
        }
        return $data;
    }
    public function categoryChart(){
        $cat=[];
        $date = Carbon::now('America/Lima');
        $mes = $date->month + 1;
        $year = $date->year;
        for ($i=1; $i <= 12 ; $i++) {
            if($mes - $i <= 0){ 
                $fecha = Carbon::parse(($year-1).'-'.$i.'-'.'01')->format('M');
                array_push($cat,$fecha);
            }
        }
        for ($i=12; $i >= 1 ; $i--) {
            if($mes - $i > 0){ 
                $fecha = Carbon::parse($year.'-'.($mes - $i).'-'.'01')->format('M');
                array_push($cat,$fecha);
            }
        }
        return $cat;
    }
    public function serieChart(string $name,string $color, string $stage)
    {
        $serie = ["name" => $name, "color" => $color, "data" => $this->dataChart($stage)];
        return $serie;
    }
}
