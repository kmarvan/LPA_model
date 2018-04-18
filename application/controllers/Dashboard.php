<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    private $LPAConfig;
    
    public function __construct() {
        
        parent::__construct();
        /*config values can be loaded dynamic*/
        $this->LPAConfig = array(
                        'b'         => 11.68,
                        'cel'       => 0.009264,
                        'cea'       => 0.01097,
                        'μl'        => 0.5129,
                        'cpa'       => 0.01779,
                        'μa'        => 0.1108,
                        'L0'        => 38,
                        'P0'        => 1.666667,
                        'A0'        => 42.66667,
                        'startTime' => 0,
                        'endTime'   => 40
                    );
    }
    
    
	public function index()
	{
        $data['main']       = 'main_view';
        $data['title']      = 'Dashboard';
        $data['content']    = 'dashboard';  /*name of the content view need to display*/
        $data['LPA']        = $this->LPAConfig;
        $this->load->vars($data);
        $this->load->view('layout', $data);
	}
    
    public function calculateLPA()
    {
        
        $lpaParam = $this->LPAConfig;
        $data = array();
        $L = array();
        $P = array();
        $A = array();
        $lpaParam['startTime']  = $this->input->post('startTime');
        $lpaParam['endTime']    = $this->input->post('endTime');
        
        if(isset($lpaParam['startTime']) && is_numeric($lpaParam['startTime']) && isset($lpaParam['endTime']) && is_numeric($lpaParam['endTime']) )
        {
            for($i=$lpaParam['startTime'];$i<=$lpaParam['endTime'];$i++)
            {
                if($i == $lpaParam['startTime'])
                {
                    /*initial values*/
                    array_push($data, array('L' => $lpaParam['L0'], 'P' => $lpaParam['P0'], 'A' => $lpaParam['A0']));
                    //$data[$i] ['L'] = $lpaParam['L0'];
                    //$data[$i] ['P'] = $lpaParam['P0'];
                    //$data[$i] ['A'] = $lpaParam['A0'];
                } else {
                    /*formula*/
                    $dataCalculate = array();
                    $lastIndex = key( array_slice( $data, -1, 1, TRUE ) );
                    $dataCalculate['L'] = $lpaParam['b'] * $data[$lastIndex]['A'] * exp( -$lpaParam['cel'] * $data[$lastIndex]['A'] - $lpaParam['cea'] * $data[$lastIndex]['L']);
                    $dataCalculate['P'] = $data[$lastIndex]['L'] * (1-$lpaParam['μl']);
                    $dataCalculate['A'] = $data[$lastIndex]['P'] * exp(-$lpaParam['cpa'] * $data[$lastIndex]['A']) + (1-$lpaParam['μa']) * $data[$lastIndex]['A'];
                    
                    array_push($data,$dataCalculate);
                    
//                    $data[$i] ['L'] = $lpaParam['b'] * $data[$i-1]['A'] * exp( -$lpaParam['cel'] * $data[$i-1]['A'] - $lpaParam['cea'] * $data[$i-1]['L']);
//                    $data[$i] ['P'] = $data[$i-1]['L'] * (1-$lpaParam['μl']);
//                    $data[$i] ['A'] = $data[$i-1]['P'] * exp(-$lpaParam['cpa'] * $data[$i-1]['A']) + (1-$lpaParam['μa']) * $data[$i-1]['A'];
                }
            }
            
            foreach($data as $time => $value)
            {
                $L[$time] = array("x" => $time, "y" => $value['L']);
                $P[$time] = array("x" => $time, "y" => $value['P']);
                $A[$time] = array("x" => $time, "y" => $value['A']);
            }
            
            /*success response*/
            $graphdata = array("L" => $L,"P" => $P,"A" => $A);
        
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($graphdata));
        }else{
        
            /*error code*/
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(412)
                    ->set_output(json_encode(array(array("message" => "Start time and end time should be natural number"))));
        }
        
    }
	
	    public function calculateL()
    {
        
        $lpaParam = $this->LPAConfig;
        $data = array();
        $L = array();
        $P = array();
        $A = array();
        $time = $this->input->get('time');
        
        if(isset($time) && is_numeric($time))
        {
            for($i=0;$i<=$time;$i++)
            {
                if($i == 0)
                {
                    /*initial values*/
                    $data[$i] ['L'] = $lpaParam['L0'];
                    $data[$i] ['P'] = $lpaParam['P0'];
                    $data[$i] ['A'] = $lpaParam['A0'];
                } else {
                    /*formula*/
                    $data[$i] ['L'] = $lpaParam['b'] * $data[$i-1]['A'] * exp( -$lpaParam['cel'] * $data[$i-1]['A'] - $lpaParam['cea'] * $data[$i-1]['L']);
                    $data[$i] ['P'] = $data[$i-1]['L'] * (1-$lpaParam['μl']);
                    $data[$i] ['A'] = $data[$i-1]['P'] * exp(-$lpaParam['cpa'] * $data[$i-1]['A']) + (1-$lpaParam['μa']) * $data[$i-1]['A'];
                }
            }
            
            foreach($data as $time => $value)
            {
                $L[$time] = array("x" => $time, "y" => $value['L']);
                $P[$time] = array("x" => $time, "y" => $value['P']);
                $A[$time] = array("x" => $time, "y" => $value['A']);
            }
            
            /*success response*/
            $graphdata = array("L" => $L);
        
            return $this->output
                    ->set_content_type('applicationL/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($graphdata));
        }else{
        
            /*error code*/
            return $this->output
                    ->set_content_type('applicationL/json')
                    ->set_status_header(412)
                    ->set_output(json_encode(array(array("message" => "Time should be natural number"))));
        }
        
    }
    
}
