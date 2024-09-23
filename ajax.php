<?php
add_action('wp_ajax_ticketsForm', 'submituserNewticket');
add_action('wp_ajax_nopriv_ticketsForm', 'submituserNewticket');
function submituserNewticket(){
    require_once('tickets/tickets-form.php');
    exit();
}

add_action('wp_ajax_customerForm', 'customerForm');
add_action('wp_ajax_nopriv_customerForm', 'customerForm');
function customerForm(){
    global $wpdb;
    $customer=$_POST['customer'];
    //echo json_encode($_POST);
    foreach ($customer as $key => $customer_detail) {
        foreach ($customer_detail as $cust_key => $customer_value) {
            $values=array(
				'ticket_name'=>$cust_key
			);
			$wpdb->insert($wpdb->prefix.'bizworld_book_ticket',$values);
			$ticketId= $wpdb->insert_id;
            foreach($customer_value as $ckey=>$cust_value){
                $custValues=array(
    				'ticket_id'=>$ticketId,
    				'name'=>$cust_value['name'],
    				'email'=>$cust_value['email'],
                	'mobile_phone'=>$cust_value['phone'],
                	'designation'=>$cust_value['designation'],
                	'companyname'=>$cust_value['companyname']
    			);
    			$wpdb->insert($wpdb->prefix.'bizworld_customer',$custValues);
            }
        }
        
    }
    
    $message ="<html><head></head><body>";
          foreach ($customer as $key => $customer_detail) {
            foreach ($customer_detail as $cust_key => $customer_value) {
            $message .= "<div>".$cust_key."
            <table name='contact_seller' cellpadding='15' style='border-collapse:collapse';> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Phone</th>
                        <th>Designation</th>
                        <th>Company Name</th>
                    </tr>    
                </thead>
                <tbody>";
                    $inc=1;
                    foreach($customer_value as $ckey=>$cust_value){
                        $message .="<tr>
                            <td>" . $inc++ ."</td>
                            <td>".$cust_value['name']."</td>
                            <td>".$cust_value['email']."</td>
                            <td>".$cust_value['phone']."</td>
                            <td>".$cust_value['designation']."</td>
                            <td>".$cust_value['companyname']."</td>
                        </tr>";
                     } 
                $message .= "</tbody>";
            $message .= "</table>";
            $message .= "</div>";
            }
        }
        $message .= "</body>";
        $message .= "</html>"; //end of $message
        $to      = 'contact@bizworldventures.com';
        $subject = 'Ticket Booking Detail';
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: contact@bizworldventures.com' . "\r\n";
        $headers .= 'Reply-To: contact@bizworldventures.com' . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();
        
        if(mail($to, $subject, $message, $headers)) {
            echo 'Email sent successfully';
        } else {
            echo 'Email sending failed';
        }
        exit();
}
?>