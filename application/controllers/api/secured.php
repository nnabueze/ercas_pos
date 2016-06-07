<?php defined('BASEPATH') OR exit('No direct script access allowed');


// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'/libraries/REST_Controller.php';

class Secured extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
		$this->load->model('bill_model');
		$this->load->model('payment_model');
		$this->load->model('client_model');
        
        
    }
    
    function bill_get()
    {		
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        $bill = $this->bill_model->getData( $this->get('id') );
		//$bill = null;
    	
        if($bill)
        {
            $this->response($bill, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No bill found!'), 404);
        }
    }
    
    function bill_post()
    {
       
	   $message = $this->bill_model->setData();

        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
        
    function bills_get()
    {
        $bills = $this->bill_model->getData();
                
        if($bills)
        {
            $this->response($bills, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No bills found!'), 404);
        }
    }
	
	
	function client_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }
        if (!$this->get('collector_id')) 
        {
            $this->response(NULL, 400);
        }

        //loading propel collector model
        $this->load->model('propel/CollectorQuery');

        //checking if collector is registered
        $collector = $this->CollectorQuery->getCollector($this->get('collector_id'));

        if ( ! $collector) {

           $this->response(array('error' => 'Not Authorized!'), 404);
        }

        $client = $this->client_model->getData2( $this->get('id') );
		// die(var_dump($client));
    	
        if($client)
        {
            $this->response($client, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No client found!'), 404);
        }
    }
    
    function client_post()
    {
       
	   $message = $this->client_model->setData();

        
        $this->response($message, 200); // 200 being the HTTP response code
    }
    
        
    function clients_get()
    {
        $clients = $this->client_model->getData();
                
        if($clients)
        {
            $this->response($clients, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No clients found!'), 404);
        }
    }
	
	function payment_get()
    {
        if(!$this->get('id'))
        {
        	$this->response(NULL, 400);
        }

        $payment = $this->payment_model->getData( $this->get('id') );
    	
        if($payment)
        {
            $this->response($payment, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No payment found!'), 404);
        }
    }
    
    function payment_post()
    {
       
	   $id = $this->post('Transaction_id');
	   $date = $this->post('Transactiondate');
	   $acct = $this->post('Account_no');
	   $amt = $this->post('Amount_paid');
	   $sbank = $this->post('Source_bank');
	   $dbank = $this->post('Dest_bank');
       $phone = $this->post('phone');
	   $collectorid = $this->post('collector_id');

        //loading propel collector model(POS payment)
        $this->load->model('propel/CollectorQuery');

        //checking if collector is registered
        $collector = $this->CollectorQuery->getCollector($collectorid);

        if ( ! $collector) {

           $this->response(array('error' => 'Not Authorized!'), 404);
        }

        //load propel collector payment model
        $this->load->model('propel/CollectorPayment');

        //insert payment records to the collector payment table
        $check = $this->CollectorPayment->setData($id,$date,$acct,$amt, $phone, $sbank, $dbank, $collectorid);
	   
	   $message = $this->payment_model->setData($id,$date,$acct,$amt, $phone, $sbank, $dbank);

		//log for test purposes
		$this->payment_model->setTestData();
    
		if($message === false)
	  	{
        	$this->response(NULL, 400); // 400 being the HTTP response code
	 	}
		else 
		{
			//$this->SendSMS($amt, $date, $phone, $acct);
		    $this->response($message, 200); // 200 being the HTTP response code
		}
    }

	function payments_put()
    {
		$message = $this->payment_model->updateStatus();
        
        $this->response($message, 200); // 200 being the HTTP response code
    }
	
	function payments_post()
    {
	   $message = $this->payment_model->updateStatus();
        
       $this->response($message, 200); // 200 being the HTTP response code
    }
    
        
    function payments_get()
    {
       //$sdate =  $this->get('sdate');
       //$edate =  $this->get('edate');

        $status =  $this->get('status');

        $payments = $this->payment_model->getDataByUploadStatus($status);
                
        if($payments)
        {
            $this->response($payments, 200); // 200 being the HTTP response code
        }

        else
        {
            $this->response(array('error' => 'No payments found!'), 404);
        }
    }


//utility function to send sms

	function SendSMS($amount, $date, $phone, $account)
	{
		if(!empty($phone))
		{
			$sender = 'FCTWB';
	
			$smsurl="http://www.smslive247.com/http/index.aspx?cmd=sendquickmsg&owneremail=ayoroy@klugandheimer.com&subacct=SUB1&subacctpwd=royz1234&message=".rawurlencode(sprintf(SMS_PAYMENT_NOTIFICATION, $account, $amount,$date))."&sender=".$sender."&sendto=".$phone."&msgtype=0";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_URL, $smsurl);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			curl_close($ch);
			
			return 1;
                  
	   }
	   
	   return 0;

    }
	
}