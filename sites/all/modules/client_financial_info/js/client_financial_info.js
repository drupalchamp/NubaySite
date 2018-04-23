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
		$("#edit-submitted-other-income-options-tafdc, #edit-submitted-other-income-options-ssi, #edit-submitted-other-income-options-ssdi, #edit-submitted-other-income-options-alimony, #edit-submitted-other-income-options-child-support, #edit-submitted-other-income-options-rental-income, #edit-submitted-other-income-options-other, #edit-submitted-current-income, #edit-submitted-current-income-options, #edit-submitted-other-income-options-total-from-above-option, #edit-submitted-right-fieldset-container-family-size").on("change", function() {
																																																																																									
			 
           TotalOther = 0.0;
		   CurrentIncome = 0.0;
		   ClientYearlyIncome = 0.0;
		   FPL = 0.0;
           if ( !($('#edit-submitted-other-income-options-tafdc').val() === '') ) {
			  TAFDC = $('#edit-submitted-other-income-options-tafdc').val();
              TotalOther = parseFloat(TotalOther) + parseFloat(TAFDC);
           }
		   if ( !($('#edit-submitted-other-income-options-ssi').val() === '') ) {
			  SSI = $('#edit-submitted-other-income-options-ssi').val();
			  TotalOther = parseFloat(TotalOther) + parseFloat(SSI);
           }
		   if ( !($('#edit-submitted-other-income-options-ssdi').val() === '') ) {
			  SSDI = $('#edit-submitted-other-income-options-ssdi').val();
			  TotalOther = parseFloat(TotalOther) + parseFloat(SSDI);
           }
		   if ( !($('#edit-submitted-other-income-options-alimony').val() === '') ) {
			  Alimony = $('#edit-submitted-other-income-options-alimony').val();
			  TotalOther = parseFloat(TotalOther) + parseFloat(Alimony);
           }
		   if ( !($('#edit-submitted-other-income-options-child-support').val() === '') ) {
			  ChildSupport = $('#edit-submitted-other-income-options-child-support').val();
			  TotalOther = parseFloat(TotalOther) + parseFloat(ChildSupport);
           }
		   if ( !($('#edit-submitted-other-income-options-rental-income').val() === '') ) {
              RentalIncome = $('#edit-submitted-other-income-options-rental-income').val();
			  TotalOther = parseFloat(TotalOther) + parseFloat(RentalIncome);
           }
		   if ( !($('#edit-submitted-other-income-options-other').val() === '') ) {
			  Other = $('#edit-submitted-other-income-options-other').val();
			  TotalOther = parseFloat(TotalOther) + parseFloat(Other);
           }
		   
		   OtherIncomeOption = $('#edit-submitted-other-income-options-total-from-above-option').val();
		   if(OtherIncomeOption == 'Weekly'){
			 TotalOther = parseFloat(TotalOther) * 52;
		   }else if(OtherIncomeOption == 'Bimonthly'){
			 TotalOther = parseFloat(TotalOther) * 26;
		   }else if(OtherIncomeOption == 'Monthly'){
			  TotalOther = parseFloat(TotalOther) * 12;
		   }


			$('#edit-submitted-other-income-options-total-from-above').val(parseFloat(TotalOther).toFixed(2));
			
			if ( !($('#edit-submitted-current-income').val() === '') ) {
				CurrentIncome = $('#edit-submitted-current-income').val();
				IncomeOption = $('#edit-submitted-current-income-options').val();
				if(IncomeOption == 'Weekly'){
					CurrentIncome = parseFloat(CurrentIncome) * 52;
				}else if(IncomeOption == 'Bimonthly'){
					CurrentIncome = parseFloat(CurrentIncome) * 26;
				}else if(IncomeOption == 'Monthly'){
					CurrentIncome = parseFloat(CurrentIncome) * 12;
				}
			}
			
			ClientYearlyIncome = parseFloat(CurrentIncome) + parseFloat(TotalOther);
			$('#edit-submitted-right-fieldset-container-client-yearly-income').val(parseFloat(ClientYearlyIncome).toFixed(2));
			
			if ( !($('#edit-submitted-right-fieldset-container-family-size').val() === '') ) {
			  familySize = $('#edit-submitted-right-fieldset-container-family-size').val();
			  if(familySize == 1){
					FPL = (parseFloat(ClientYearlyIncome)/11880) * 100;
		      }else if(familySize == 2){
					FPL = (parseFloat(ClientYearlyIncome)/16020) * 100;
			  }else if(familySize == 3){
					FPL = (parseFloat(ClientYearlyIncome)/20160) * 100;
			  }else if(familySize == 4){
					FPL = (parseFloat(ClientYearlyIncome)/24300) * 100;
			  }else if(familySize == 5){
					FPL = (parseFloat(ClientYearlyIncome)/28440) * 100;
			  }else if(familySize == 6){
					FPL = (parseFloat(ClientYearlyIncome)/32580) * 100;
			  }else if(familySize == 7){
					FPL = (parseFloat(ClientYearlyIncome)/36730) * 100;
			  }else if(familySize == 8){
					FPL = (parseFloat(ClientYearlyIncome)/40890) * 100;
			  }
			  $('#edit-submitted-right-fieldset-container-percent-of-fpl').val(parseFloat(FPL).toFixed(2));
			}else{
			  $('#edit-submitted-right-fieldset-container-percent-of-fpl').val("");
			}
			
			
		   });




	$("#edit-submitted-current-income, #edit-submitted-other-income-options-tafdc, #edit-submitted-other-income-options-ssi, #edit-submitted-other-income-options-ssdi, #edit-submitted-other-income-options-alimony, #edit-submitted-other-income-options-child-support, #edit-submitted-other-income-options-rental-income, #edit-submitted-other-income-options-other").on("change", function() {
	    	 var amount = $(this).val();
							if(amount){
							amount = parseFloat(amount).toFixed(2);
							$(this).val(parseFloat(amount).toFixed(2));
							}
				 });

	

		if (document.getElementById('webform-client-form-1437')) {
    $("#edit-submitted-current-income,#edit-submitted-other-income-options-tafdc,#edit-submitted-other-income-options-ssi,#edit-submitted-other-income-options-ssdi,#edit-submitted-other-income-options-alimony,#edit-submitted-other-income-options-child-support,#edit-submitted-other-income-options-rental-income,#edit-submitted-other-income-options-other").keypress(function(event) {
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
		}



   }
 };
})(jQuery);