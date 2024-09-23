<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
<link rel="stylesheet" href="../asset/css/tickets.css">
<link rel="stylesheet" href="../asset/css/styles.css">
<?php
$ticketsList = array(
        "speaker_registration" => array(
        "ticket_title" => "Speaker Registration",
        "ticket_description" => "Offers a 15 minutes exclusive stage slot / or Panel speaking slot and Access to all sessions on both days along with pre and post event promotions as a speaker.",
        "ticket_price" => "44999.00",
        "display_ticket_price" => "₹44,999.00",
        "ticket_available" => "40 available",
        "ticket_id" => "ticket_4"
    ),
    
    "delegate_both_days" => array(
        "ticket_title" => "Delegate (Both Days)",
        "ticket_description" => "Inclusions: Access to all sessions on both days with Lunch and Coffee Breaks",
        "ticket_price" => "24999.00",
        "display_ticket_price" => "₹24,999.00",
        "ticket_available" => "100 available",
        "ticket_id" => "ticket_1"
    ),
    

    
     "networking_dinner" => array(
        "ticket_title" => "Networking Dinner",
        "ticket_description" => "Access to offsite Networking Dinner on the first day",
        "ticket_price" => "7999.00",
        "display_ticket_price" => "₹7,999.00",
        "ticket_available" => "50 available",
        "ticket_id" => "ticket_3"
    )
    
);
?>
<div class="container-fluid">
  <h2 class="raju">Tickets</h2>
  <?php foreach ($ticketsList as $tickets_key => $tickets_details) { ?>
  <div class="row">
    <div class="col-sm-8 ticketRow">
      <h3 id="ticketTitle-<?php echo $tickets_details['ticket_id'] ?>"><?php echo $tickets_details['ticket_title'] ?></h3>
      <p id="ticketdescription-<?php echo $tickets_details['ticket_id'] ?>"><?php echo $tickets_details['ticket_description'] ?></p>
    </div>
    <div class="col-sm-2 ticketRow">
        <h3 class="ticketPrice" id="ticketPrice-<?php echo $tickets_details['ticket_id'] ?>" ticket-price="<?php echo $tickets_details['ticket_price'] ?>"><?php echo $tickets_details['display_ticket_price'] ?></h3>
        <p><?php echo $tickets_details['ticket_available'] ?></p>
    </div>
    <div class="col-sm-2 ticketRow">
        <div class="buttonSection">
          <input type=button value="-" ticket-id="<?php echo $tickets_details['ticket_id'] ?>" class="decreaseQuantity" />
            <span id="display_quentity_<?php echo $tickets_details['ticket_id'] ?>">0</span>
          <input type=button value="+" ticket-id="<?php echo $tickets_details['ticket_id'] ?>" class="increaseQuantity" />
      </div>
    </div>
  </div>
  <?php } ?>
  <div class="row buttomRow">
      <div class="col-sm-10 ticketRow">
          <div class="priceAndQtySection">
            <h4>
               <span class="totalQuentity"></span>
               <span class="totalPrice"></span>
            </h4>
          </div>
      </div>
      <div class="col-sm-2 ticketRow">
          <button disabled class="btn btn-primary getTickets" type="button">Get Tickets</button>
      </div>
  </div>
</div>

<div style="text-align:center;padding: 15% 40%;" id="loaderOverLay" class="ticketOverLay">
  <div class="loader"></div>
</div>

<div id="ticketOverLay" class="ticketOverLay">
    <div class="ticketBox">
        <span class="closeModal">X</span>
        <div class="ticket-from-section">
        </div>
    </div>
</div>    

<div class="background">
  <div class="CartContainer">
    <div class="Header">
    <h3 class="Heading">Tickets</h3>
    </div>
	<?php foreach ($ticketsList as $tickets_key => $tickets_details) { ?>
    <div class="Cart-Items">
      <div class="image-box">
      <img src="../asset/images/apple.png" style="height: 120px">
      </div>
      <div class="about">
      <h1 id="ticketTitle-<?php echo $tickets_details['ticket_id'] ?>"><?php echo $tickets_details['ticket_title'] ?></h1>
      <p id="ticketdescription-<?php echo $tickets_details['ticket_id'] ?>"><?php echo $tickets_details['ticket_description'] ?></p>
      </div>
      <div class="counter">
      <div class="btn">
	   <input type=button value="-" ticket-id="<?php echo $tickets_details['ticket_id'] ?>" class="decreaseQuantity" />
	  </div>
      <div class="count">
	  	<span id="display_quentity_<?php echo $tickets_details['ticket_id'] ?>">0</span>
	  </div>
      <div class="btn">
	  	<input type=button value="+" ticket-id="<?php echo $tickets_details['ticket_id'] ?>" class="increaseQuantity" />
	  </div>
      </div>
      <div class="prices">
      <div class="amount">
		<h3 class="ticketPrice" id="ticketPrice-<?php echo $tickets_details['ticket_id'] ?>" ticket-price="<?php echo $tickets_details['ticket_price'] ?>"><?php echo $tickets_details['display_ticket_price'] ?></h3>
	  </div>
      </div>
    </div>
	<?php } ?>
    <hr> 
    <div class="checkout">
    <div class="total">
    <div>
      <div class="totalPrice"></div>
    </div>
    <div class="totalPrice"></div>
    </div>
    <button class="button">Checkout</button></div>
  </div>
</div>