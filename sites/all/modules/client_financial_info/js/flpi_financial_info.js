(function ($) {
  Drupal.behaviors.client_financial_info = {
    attach: function (context) {
		
		
		var TAFDC = 0.0;
		var SSI = 0.0;
		var SSDI = 0.0;
		var Alimony = 0.0;
		var ChildSupport = 0.0;
		var RentalIncome = 0.0;
		var Other = 0.0;
		var CurrentIncome = 0.0;
		var TotalOther = 0.0;
		var ClientYearlyIncome = 0.0;
		var FPL = 0.0;
		$("#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-384, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-385, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-386, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-387, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-388, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-389, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-390, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-382, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-368,  #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-369, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-363").on("change", function() {
																																																																																									
			 
           TotalOther = 0.0;
		   CurrentIncome = 0.0;
		   ClientYearlyIncome = 0.0;
		   FPL = 0.0;
           if ( !($('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-384').val() === '') ) {
			  TAFDC = $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-384').val();
              TotalOther = parseFloat(TotalOther) + parseFloat(TAFDC);
           }
		   if ( !($('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-385').val() === '') ) {
			  SSI = $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-385').val();
			  TotalOther = parseFloat(TotalOther) + parseFloat(SSI);
           }
		   if ( !($('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-386').val() === '') ) {
			  SSDI = $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-386').val();
			  TotalOther = parseFloat(TotalOther) + parseFloat(SSDI);
           }
		   if ( !($('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-387').val() === '') ) {
			  Alimony = $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-387').val();
			  TotalOther = parseFloat(TotalOther) + parseFloat(Alimony);
           }
		   if ( !($('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-388').val() === '') ) {
			  ChildSupport = $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-388').val();
			  TotalOther = parseFloat(TotalOther) + parseFloat(ChildSupport);
           }
		   if ( !($('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-389').val() === '') ) {
              RentalIncome = $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-389').val();
			  TotalOther = parseFloat(TotalOther) + parseFloat(RentalIncome);
           }
		   if ( !($('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-390').val() === '') ) {
			  Other = $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-390').val();
			  TotalOther = parseFloat(TotalOther) + parseFloat(Other);
           }
		   
		   OtherIncomeOption = $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-369').val();
		   if(OtherIncomeOption == 'Weekly'){
			 TotalOther = parseFloat(TotalOther) * 52;
		   }else if(OtherIncomeOption == 'Bimonthly'){
			 TotalOther = parseFloat(TotalOther) * 26;
		   }else if(OtherIncomeOption == 'Monthly'){
			  TotalOther = parseFloat(TotalOther) * 12;
		   }
		   $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-392').val(parseFloat(TotalOther).toFixed(2));


			$('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-391').val(parseFloat(TotalOther).toFixed(2));
			
			if ( !($('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-382').val() === '') ) {
				CurrentIncome = $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-382').val();
				IncomeOption = $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-368').val();
				if(IncomeOption == 'Weekly'){
					CurrentIncome = parseFloat(CurrentIncome) * 52;
				}else if(IncomeOption == 'Bimonthly'){
					CurrentIncome = parseFloat(CurrentIncome) * 26;
				}else if(IncomeOption == 'Monthly'){
					CurrentIncome = parseFloat(CurrentIncome) * 12;
				}
				$('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-393').val(parseFloat(CurrentIncome).toFixed(2));
			}
			
			ClientYearlyIncome = parseFloat(CurrentIncome) + parseFloat(TotalOther);
			$('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-383').val(parseFloat(ClientYearlyIncome).toFixed(2));
			
			if ( !($('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-363').val() === '') ) {
			  familySize = $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-363').val();
			  if(familySize == 1){
					FPL = (parseFloat(ClientYearlyIncome)/12140) * 100;
		      }else if(familySize == 2){
					FPL = (parseFloat(ClientYearlyIncome)/16460) * 100;
			  }else if(familySize == 3){
					FPL = (parseFloat(ClientYearlyIncome)/20780) * 100;
			  }else if(familySize == 4){
					FPL = (parseFloat(ClientYearlyIncome)/25100) * 100;
			  }else if(familySize == 5){
					FPL = (parseFloat(ClientYearlyIncome)/29420) * 100;
			  }else if(familySize == 6){
					FPL = (parseFloat(ClientYearlyIncome)/33740) * 100;
			  }else if(familySize == 7){
					FPL = (parseFloat(ClientYearlyIncome)/38060) * 100;
			  }else if(familySize == 8){
					FPL = (parseFloat(ClientYearlyIncome)/42360) * 100;
			  }
			  $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-365').val(parseFloat(FPL).toFixed(2));
			}else{
			  $('#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-365').val("");
			}
			
			
		   });				
					
					
					
	
	
	
	$("#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-382, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-384, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-385, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-386, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-387, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-388, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-389, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-390").on("change", function() {
	    	 var amount = $(this).val();
							if(amount){
							amount = parseFloat(amount).toFixed(2);
							$(this).val(parseFloat(amount).toFixed(2));
							}
				 });
	
	

		//if (document.getElementById('webform-client-form-1325')) {
    $("#edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-382, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-384, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-385, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-386,  #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-387,  #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-388,  #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-389, #edit-submitted-client-financial-information-civicrm-1-case-1-cg28-custom-390").keypress(function(event) {
     // Backspace, tab, enter, end, home, left, right,decimal(.)in number part, decimal(.) in alphabet
     // We don't support the del key in Opera because del == . == 46.
     //var controlKeys = [0,8,32,46,50,64,127,190];
     var controlKeys = [0,8,16,32,46,50,64,95,127,173,190];
     // IE doesn't support indexOf
     var isControlKey = controlKeys.join(",").match(new RegExp(event.which));
     // Some browsers just don't raise events for control keys. Easy.
     // e.g. Safari backspace.
     if (!event.which || // Control keys in most browsers. e.g. Firefox tab is 0
      (48 <= event.which && event.which <= 57) || // Always 0 through 9
      isControlKey) { // Opera assigns values for control keys.
      return;
     } else {
      event.preventDefault();
     }
    });
		//}



   }
 };
})(jQuery);