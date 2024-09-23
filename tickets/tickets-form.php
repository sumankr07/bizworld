<?php $ticketsList = $_POST['formData']; ?>
<div class="container-fluid">
  <h2>Tickets</h2>
  <?php
  $totalQty=0;
  $totalPrice=0;
  foreach ($ticketsList as $tickets_key => $tickets_details) {
      $totalQty=$totalQty+$tickets_details['ticket_Quentity'];
      $totalPrice=$totalPrice+$tickets_details['ticket_price'];
  ?>
  <div class="row">
    <div class="col-sm-8 ticketRow">
      <span class="removeTicket" ticket-id="<?php echo $tickets_details['ticket_id'] ?>">X</span>
      <h4 id="ticketTitle-<?php echo $tickets_details['ticket_id'] ?>"><?php echo $tickets_details['ticket_title'] ?></h4>
      <p id="ticketdescription-<?php echo $tickets_details['ticket_id'] ?>"><?php echo $tickets_details['ticket_description'] ?></p>
    </div>
    <div class="col-sm-2 ticketRow">
        <h3 class="ticketPrice" id="ticketPrice-<?php echo $tickets_details['ticket_id'] ?>" ticket-price="<?php echo $tickets_details['ticket_price'] ?>"><?php echo $tickets_details['display_ticket_price'] ?></h3>
        <p><?php echo $tickets_details['ticket_available'] ?></p>
    </div>
    <div class="col-sm-2 ticketRow">
        <div class="buttonSection">
          <input type=button value="-" ticket-id="<?php echo $tickets_details['ticket_id'] ?>" class="decreaseQty" />
            <span id="display_quentity_<?php echo $tickets_details['ticket_id'] ?>"><?php echo $tickets_details['ticket_Quentity'] ?></span>
          <input type=button value="+" ticket-id="<?php echo $tickets_details['ticket_id'] ?>" class="increaseQty" />
      </div>
    </div>
  </div>
  <?php } ?>'
  <div class="row buttomRow">
      <div class="col-sm-10 ticketRow">
          <div class="priceAndQtySection">
            <h4>
               <span class="totalQuentity">Total Quentity : <?php echo $totalQty ?></span>
               <span class="totalPrice">Total Price : <?php echo $totalPrice ?> INR</span>
            </h4>
          </div>
      </div/>
  </div>
  <form class="checkout-form">
      <input type="hidden" name="action" value="customerForm"/>
  <?php foreach ($ticketsList as $tickets_key => $tickets_details) { ?>
  
     <div class="row">
      <div class="col-sm-12 ticketRow">
          <h3><?php echo $tickets_details['ticket_title'] ?></h3>
      <?php for ($i = 1; $i <= $tickets_details['ticket_Quentity']; $i++) { ?>
      <div class="row">
          <div class="col-sm-12 ticketRow">
              <h3>Attendee <?php echo $i; ?></h3>
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-sm-2 ticketRow">
                     <label>Name *</label>
                </div>
                <div class="col-sm-8 ticketRow">
                    <input type="text" name="customer[<?php echo $tickets_key; ?>][<?php echo $tickets_details['ticket_title']; ?>][<?php echo $i; ?>][name]" class="form-control" required="required" placeholder=""/>
                                        
                </div>
              </div>
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-sm-2 ticketRow">
                     <label>Email *</label>
                </div>
                <div class="col-sm-8 ticketRow">
                    <input type="email" name="customer[<?php echo $tickets_key; ?>][<?php echo $tickets_details['ticket_title']; ?>][<?php echo $i; ?>][email]" class="form-control" required="required" placeholder=""/>
                                        
                </div>
              </div>
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-sm-2 ticketRow">
                     <label>Mobile Phone *</label>
                </div>
                <div class="col-sm-8 ticketRow">
                    <input type="text" name="customer[<?php echo $tickets_key; ?>][<?php echo $tickets_details['ticket_title']; ?>][<?php echo $i; ?>][phone]" class="form-control" required="required" placeholder=""/>
                                        
                </div>
              </div>
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-sm-2 ticketRow">
                     <label>Designation</label>
                </div>
                <div class="col-sm-8 ticketRow">
                    <input type="text" name="customer[<?php echo $tickets_key; ?>][<?php echo $tickets_details['ticket_title']; ?>][<?php echo $i; ?>][designation]" class="form-control" placeholder=""/>
                                        
                </div>
              </div>
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-sm-2 ticketRow">
                     <label>Firm / Company Name</label>
                </div>
                <div class="col-sm-8 ticketRow">
                    <textarea name="customer[<?php echo $tickets_key; ?>][<?php echo $tickets_details['ticket_title']; ?>][<?php echo $i; ?>][companyname]" class="form-control">
                        
                    </textarea>
                                        
                </div>
              </div>        
            <div class="row" style="margin-bottom: 10px;">
            <div class="col-sm-2 ticketRow">
                <label>Industry *</label>
            </div>
            <div class="col-sm-8 ticketRow">
                <select name="customer[<?php echo $tickets_key; ?>][<?php echo $tickets_details['ticket_title']; ?>][<?php echo $i; ?>][industry]" class="form-control" required="required">
                    <option value="Agriculture and Allied Industries">Agriculture and Allied Industries</option>
                    <option value="Artificial Intelligence (AI)">Artificial Intelligence (AI)</option>
                    <option value="Auto Components">Auto Components</option>
                    <option value="Automobiles">Automobiles</option>
                    <option value="Aviation">Aviation</option>
                    <option value="Banking">Banking</option>
                    <option value="Biotechnology">Biotechnology</option>
                    <option value="Cement">Cement</option>
                    <option value="Chemicals">Chemicals</option>
                    <option value="Consumer Durables">Consumer Durables</option>
                    <option value="Co-working Spaces">Co-working Spaces</option>
                    <option value="Cryptocurrency">Cryptocurrency</option>
                    <option value="Defence Manufacturing">Defence Manufacturing</option>
                    <option value="Digital Marketing and Advertising">Digital Marketing and Advertising</option>
                    <option value="E-Commerce & Online Retail">E-Commerce & Online Retail</option>
                    <option value="Education and Training">Education and Training</option>
                    <option value="Electric Vehicle">Electric Vehicle</option>
                    <option value="Electronics System Design & Manufacturing">Electronics System Design & Manufacturing</option>
                    <option value="Engineering and Capital Goods">Engineering and Capital Goods</option>
                    <option value="Financial Services">Financial Services</option>
                    <option value="FinTech (Financial Technology)">FinTech (Financial Technology)</option>
                    <option value="FMCG">FMCG</option>
                    <option value="Food Processing">Food Processing</option>
                    <option value="Gems and Jewellery">Gems and Jewellery</option>
                    <option value="Health and Wellness">Health and Wellness</option>
                    <option value="Infrastructure">Infrastructure</option>
                    <option value="Insurance">Insurance</option>
                    <option value="IT & BPM">IT & BPM</option>
                    <option value="Manufacturing">Manufacturing</option>
                    <option value="Media and Entertainment">Media and Entertainment</option>
                    <option value="Medical Devices">Medical Devices</option>
                    <option value="Metals and Mining">Metals and Mining</option>
                    <option value="MSME">MSME</option>
                    <option value="Oil and Gas">Oil and Gas</option>
                    <option value="Paper & Packaging">Paper & Packaging</option>
                    <option value="Pharmaceuticals">Pharmaceuticals</option>
                    <option value="Ports">Ports</option>
                    <option value="Power">Power</option>
                    <option value="Railways">Railways</option>
                    <option value="Real Estate and Property Technology (PropTech)">Real Estate and Property Technology (PropTech)</option>
                    <option value="Renewable Energy and Sustainability">Renewable Energy and Sustainability</option>
                    <option value="Retail">Retail</option>
                    <option value="Roads">Roads</option>
                    <option value="Science and Technology">Science and Technology</option>
                    <option value="Services">Services</option>
                    <option value="Smart Homes">Smart Homes</option>
                    <option value="Steel">Steel</option>
                    <option value="Technology & Software Development">Technology & Software Development</option>
                    <option value="Telecommunications">Telecommunications</option>
                    <option value="Textiles">Textiles</option>
                    <option value="Tourism and Hospitality">Tourism and Hospitality</option>
                </select>
            </div>
        </div>
    </div>
</div>
      <?php } ?>
      </div>
     </div>
  <?php } ?>
  <div class="row">
      <div class="col-sm-10 message">
          
      </div>
  </div>
  
  <div class="row" style="margin-right: -15px; margin-left: -11px; margin-bottom: 15px; margin-top: 15px;">
      <div class="col-sm-10 ticketRow">
          Each attendee specified will receive an email with their individual ticket included.
      </div>
      <div class="col-sm-10 ticketRow">
          <button type="submit" class="btn btn-primary">Checkout Now</button>
      </div>
   </div>
   </form>
  
</div>
