let itemArgs=[];

jQuery(document).ready(function($){
  $(document).on('click','.increaseQuantity',function(){
      let ticketId=$(this).attr("ticket-id");
      let totalPriceByTicketWise=0;
      let getQuentity=parseInt($('#display_quentity_'+ticketId).text());
      if(getQuentity>=0){
          let addQuentity=(getQuentity+1);
          
          let getTicketPrice=$('#ticketPrice-'+ticketId).attr('ticket-price');
          totalPriceByTicketWise=totalPriceByTicketWise+parseFloat(getTicketPrice)*addQuentity;
          
          let ticketdescription=$('#ticketdescription-'+ticketId).text();
          let ticketTitle=$('#ticketTitle-'+ticketId).text();
          let findTicketIndex=itemArgs.findIndex((ticket)=>ticket.ticket_id==ticketId);
          if(findTicketIndex!==-1){
              let itemArgsObj={};
              itemArgsObj['ticket_id']=ticketId;
              itemArgsObj['ticket_title']=ticketTitle;
              itemArgsObj['ticket_description']=ticketdescription;
              itemArgsObj['ticket_Quentity']=addQuentity;
              itemArgsObj['ticket_price']=totalPriceByTicketWise;
              itemArgs[findTicketIndex]=itemArgsObj;
              
          }else {
              let itemArgsObj={};
              itemArgsObj['ticket_id']=ticketId;
              itemArgsObj['ticket_title']=ticketTitle;
              itemArgsObj['ticket_description']=ticketdescription;
              itemArgsObj['ticket_Quentity']=addQuentity;
              itemArgsObj['ticket_price']=totalPriceByTicketWise;
              itemArgs.push(itemArgsObj);
          }
          let getTotalQuantityPrice=getTotalQuantityAndPrice(itemArgs);
          if(getTotalQuantityPrice.total_quantity>0){
              $('.totalQuentity').text("Quantity: "+(getTotalQuantityPrice.total_quantity));
          }else {
              $('.totalQuentity').text("");
          }
          if(getTotalQuantityPrice.total_price>0){
              $('.totalPrice').text("Total: "+(getTotalQuantityPrice.total_price).toFixed(2)+'INR');
          }else {
              $('.totalPrice').text(" ");
          }
          $('#display_quentity_'+ticketId).text(addQuentity);
          
          if(itemArgs && itemArgs.length>0 && getTotalQuantityPrice.total_quantity>0){
              $('.getTickets').removeAttr("disabled");
          }else {
            $('.getTickets').attr("disabled","disabled");  
          }
      }
      
  })
  
  $(document).on('click','.decreaseQuantity',function(){
      let ticketId=$(this).attr("ticket-id");
      let totalPriceByTicketWise=0;
      let getQuentity=parseInt($('#display_quentity_'+ticketId).text());
      
      if(getQuentity>0){
          let addQuentity=(getQuentity-1);
          
          let getTicketPrice=$('#ticketPrice-'+ticketId).attr('ticket-price');
          totalPriceByTicketWise=totalPriceByTicketWise+parseFloat(getTicketPrice)*addQuentity;
          
          let ticketdescription=$('#ticketdescription-'+ticketId).text();
          let ticketTitle=$('#ticketTitle-'+ticketId).text();
          let findTicketIndex=itemArgs.findIndex((ticket)=>ticket.ticket_id==ticketId);
          if(findTicketIndex!==-1){
              let itemArgsObj={};
              itemArgsObj['ticket_id']=ticketId;
              itemArgsObj['ticket_title']=ticketTitle;
              itemArgsObj['ticket_description']=ticketdescription;
              itemArgsObj['ticket_Quentity']=addQuentity;
              itemArgsObj['ticket_price']=totalPriceByTicketWise;
              itemArgs[findTicketIndex]=itemArgsObj;
              
          }else {
              let itemArgsObj={};
              itemArgsObj['ticket_id']=ticketId;
              itemArgsObj['ticket_title']=ticketTitle;
              itemArgsObj['ticket_description']=ticketdescription;
              itemArgsObj['ticket_Quentity']=addQuentity;
              itemArgsObj['ticket_price']=totalPriceByTicketWise;
              itemArgs.push(itemArgsObj);
          }
          let getTotalQuantityPrice=getTotalQuantityAndPrice(itemArgs);
          
          if(getTotalQuantityPrice.total_quantity>0){
              $('.totalQuentity').text("Quantity: "+(getTotalQuantityPrice.total_quantity));
          }else {
              $('.totalQuentity').text("");
          }
          if(getTotalQuantityPrice.total_price>0){
              $('.totalPrice').text("Total: "+(getTotalQuantityPrice.total_price).toFixed(2)+'INR');
          }else {
              $('.totalPrice').text(" ");
          }
          
          $('#display_quentity_'+ticketId).text(addQuentity);
          if(itemArgs && itemArgs.length>0 && getTotalQuantityPrice.total_quantity>0){
              $('.getTickets').removeAttr("disabled");
          }else {
            $('.getTickets').attr("disabled","disabled");  
          }
      }
  });
  
  $(document).on('click','.getTickets',function(){
      let ticketList=itemArgs && itemArgs.filter((ticket)=>ticket.ticket_Quentity > 0);
      
      var data = {
		'action': 'ticketsForm',
		'formData':ticketList
		
	};
	$('#loaderOverLay').show();
	$.post(tickets_ajax_data.tickets_ajax_url, data, function(response) {
	    $('.ticket-from-section').html(response);
		$('#ticketOverLay').show();
		$('#loaderOverLay').hide();
	});
  });
  
  $(document).on('click','.closeModal',function(){
      $('.ticketOverLay').hide();
  })
  
  $(document).on('click','.removeTicket',function(){
      let ticketList=itemArgs && itemArgs.filter((ticket)=>ticket.ticket_Quentity > 0);
      let ticketId=$(this).attr("ticket-id");
      let updatesList=ticketList && ticketList.filter((ticket)=>ticket.ticket_id!== ticketId);
      itemArgs=updatesList;
      
      let getTotalQuantityPrice=getTotalQuantityAndPrice(itemArgs);
          
          if(getTotalQuantityPrice.total_quantity>0){
              $('.totalQuentity').text("Quantity: "+(getTotalQuantityPrice.total_quantity));
          }else {
              $('.totalQuentity').text("");
          }
          if(getTotalQuantityPrice.total_price>0){
              $('.totalPrice').text("Total: "+(getTotalQuantityPrice.total_price).toFixed(2)+'INR');
          }else {
              $('.totalPrice').text(" ");
          }
          
          $('#display_quentity_'+ticketId).text(0);
          if(itemArgs && itemArgs.length>0 && getTotalQuantityPrice.total_quantity>0){
              $('.getTickets').removeAttr("disabled");
          }else {
            $('.getTickets').attr("disabled","disabled");
            $('#ticketOverLay').hide();
          }
      
      var data = {
		'action': 'ticketsForm',
		'formData':itemArgs
		
	};
	$('.ticket-from-section').html("<p><br/><br/>Please wait while updating the list...<p>");
	$.post(tickets_ajax_data.tickets_ajax_url, data, function(response) {
	    $('.ticket-from-section').html(response);
		
	});
      
  })
  
  $(document).on('click','.decreaseQty',function(e){
      let ticketId=$(this).attr("ticket-id");
      let totalPriceByTicketWise=0;
      let getQuentity=parseInt($('#display_quentity_'+ticketId).text());
      
      if(getQuentity>0){
          let addQuentity=(getQuentity-1);
          
          console.log('addQuentityaddQuentity???',addQuentity);
          
          let getTicketPrice=$('#ticketPrice-'+ticketId).attr('ticket-price');
          totalPriceByTicketWise=totalPriceByTicketWise+parseFloat(getTicketPrice)*addQuentity;
          
          let ticketdescription=$('#ticketdescription-'+ticketId).text();
          let ticketTitle=$('#ticketTitle-'+ticketId).text();
          let findTicketIndex=itemArgs.findIndex((ticket)=>ticket.ticket_id==ticketId);
          if(findTicketIndex!==-1){
              let itemArgsObj={};
              itemArgsObj['ticket_id']=ticketId;
              itemArgsObj['ticket_title']=ticketTitle;
              itemArgsObj['ticket_description']=ticketdescription;
              itemArgsObj['ticket_Quentity']=addQuentity;
              itemArgsObj['ticket_price']=totalPriceByTicketWise;
              itemArgs[findTicketIndex]=itemArgsObj;
              
          }else {
              itemArgs=[];
          }
          let getTotalQuantityPrice=getTotalQuantityAndPrice(itemArgs);
          
          if(getTotalQuantityPrice.total_quantity>0){
              $('.totalQuentity').text("Quantity: "+(getTotalQuantityPrice.total_quantity));
          }else {
              $('.totalQuentity').text("");
          }
          if(getTotalQuantityPrice.total_price>0){
              $('.totalPrice').text("Total: "+(getTotalQuantityPrice.total_price).toFixed(2)+'INR');
          }else {
              $('.totalPrice').text(" ");
          }
          
          $('#display_quentity_'+ticketId).text(addQuentity);
          if(itemArgs && itemArgs.length>0 && getTotalQuantityPrice.total_quantity>0){
              $('.getTickets').removeAttr("disabled");
          }else {
            $('.getTickets').attr("disabled","disabled");
            $('#ticketOverLay').hide();
          }
          
          let ticketList=itemArgs && itemArgs.filter((ticket)=>ticket.ticket_Quentity > 0);
          itemArgs=ticketList;
          
           var data = {
        		'action': 'ticketsForm',
        		'formData':itemArgs
        		
        	};
        	$('.ticket-from-section').html("<p><br/><br/>Please wait while updating the list...<p>");
        	$.post(tickets_ajax_data.tickets_ajax_url, data, function(response) {
        	    $('.ticket-from-section').html(response);
        		
        	});
      }
  });
  
  $(document).on('click','.increaseQty',function(e){
      let ticketId=$(this).attr("ticket-id");
      let totalPriceByTicketWise=0;
      let getQuentity=parseInt($('#display_quentity_'+ticketId).text());
      if(getQuentity>=0){
          let addQuentity=(getQuentity+1);
          
          let getTicketPrice=$('#ticketPrice-'+ticketId).attr('ticket-price');
          totalPriceByTicketWise=totalPriceByTicketWise+parseFloat(getTicketPrice)*addQuentity;
          
          let ticketdescription=$('#ticketdescription-'+ticketId).text();
          let ticketTitle=$('#ticketTitle-'+ticketId).text();
          let findTicketIndex=itemArgs.findIndex((ticket)=>ticket.ticket_id==ticketId);
          if(findTicketIndex!==-1){
              let itemArgsObj={};
              itemArgsObj['ticket_id']=ticketId;
              itemArgsObj['ticket_title']=ticketTitle;
              itemArgsObj['ticket_description']=ticketdescription;
              itemArgsObj['ticket_Quentity']=addQuentity;
              itemArgsObj['ticket_price']=totalPriceByTicketWise;
              itemArgs[findTicketIndex]=itemArgsObj;
              
          }else {
              itemArgs=[];
          }
          let getTotalQuantityPrice=getTotalQuantityAndPrice(itemArgs);
          if(getTotalQuantityPrice.total_quantity>0){
              $('.totalQuentity').text("Quantity: "+(getTotalQuantityPrice.total_quantity));
          }else {
              $('.totalQuentity').text("");
          }
          if(getTotalQuantityPrice.total_price>0){
              $('.totalPrice').text("Total: "+(getTotalQuantityPrice.total_price).toFixed(2)+'INR');
          }else {
              $('.totalPrice').text(" ");
          }
          $('#display_quentity_'+ticketId).text(addQuentity);
          
          if(itemArgs && itemArgs.length>0 && getTotalQuantityPrice.total_quantity>0){
              $('.getTickets').removeAttr("disabled");
          }else {
            $('.getTickets').attr("disabled","disabled");
            $('#ticketOverLay').hide();
          }
          
          var data = {
        		'action': 'ticketsForm',
        		'formData':itemArgs
        		
        	};
        	$('.ticket-from-section').html("<p><br/><br/>Please wait while updating the list...<p>");
        	$.post(tickets_ajax_data.tickets_ajax_url, data, function(response) {
        	    $('.ticket-from-section').html(response);
        		
        	});
      }
  });
  
  $(document).on('submit','.checkout-form',function(e){
      $('.message').html("<h2 style='color:red'>Please wait....</h2>");
      $.ajax({
        url: tickets_ajax_data.tickets_ajax_url,
        type: 'POST',
	    data: new FormData(this),
	    processData: false,
	    contentType: false
      }).done(function(responce) {
			$('.ticket-from-section').html("<h2 class='swe' style='color:green'>Thank you for successfully submitting your nomination! Our team will review your submission and get back to you shortly with a confirmation.Stay Tuned!</h2>");
			setTimeout(function() {
                 window.location.reload();
            }, 2000);
	  });
      e.preventDefault();
  })

});

function getTotalQuantityAndPrice(items) {
    let totalQuantityAndPriceObj={};
    let totalQuantity= items.reduce((total, item) => item.ticket_Quentity + total, 0);
    let totalPrice= items.reduce((total, item) => item.ticket_price + total, 0);
    totalQuantityAndPriceObj['total_quantity']=totalQuantity;
    totalQuantityAndPriceObj['total_price']=totalPrice;
    return totalQuantityAndPriceObj;
  }