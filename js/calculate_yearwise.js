//$(document).ready(function() {
var bin1, bin2, finalTotal;
bin1 = $(' #pnl_room #rooms_occupied_2009 ').val();
bin2 = $(' #pnl_room #average_room_rate_2009 ').val();
//alert(bin1); alert(bin2);
//bin2 = $(' #Bin1_Count option:selected ').val();
finalTotal = (parseFloat(bin1) * parseFloat(bin2)) / 1000;
//finalTotal = CurrencyFormat(finalTotal);
$(' #pnl_room #sales_2009 ').val(finalTotal.toFixed(2));

$('#rooms_occupied_2009 , #average_room_rate_2009').change(function() {
    //get txtAmt value  
    //change txtInterest% value
    var calculate_sale = ($(' #pnl_room #rooms_occupied_2009 ').val() * $(' #pnl_room #average_room_rate_2009 ').val()) / 1000;
    $('#sales_2009').val(calculate_sale);
});



var payroll_expense_percent, sales, expense_calc;
payroll_expense_percent = $(' #pnl_room #payroll_expense_percent_2009 ').val();
sales = $('  #sales_2009 ').val();
expense_calc = (parseFloat(payroll_expense_percent) * parseFloat(sales)) / 100;
//expense_calc = CurrencyFormat(expense_calc);
$('  #payroll_expense_calc_2009 ').val(expense_calc.toFixed(2));

$('#payroll_expense_percent_2009 , #sales_2009').change(function() {
    var calculate_sale = (parseFloat($('  #payroll_expense_percent_2009 ').val()) * parseFloat($('  #sales_2009 ').val())) / 100;
    $('#payroll_expense_calc_2009').val(calculate_sale.toFixed(2));
});

var other_expenses, other_expenses_calc;
other_expenses = $(' #pnl_room #other_expenses_2009 ').val();
sales = $('  #sales_2009 ').val();
other_expenses_calc = (parseFloat(other_expenses) * parseFloat(sales)) / 100;
//other_expenses_calc = CurrencyFormat(other_expenses_calc);
$('  #other_expenses_calc_2009 ').val(other_expenses_calc.toFixed(2));

var total_expense;
total_expense = parseFloat(expense_calc) + parseFloat(other_expenses_calc);
$('  #total_expense_2009 ').val(total_expense.toFixed(2));

var department_profit;
department_profit = parseFloat(sales) - parseFloat(total_expense);
$(' #department_profit_2009 ').val(department_profit.toFixed(2));
//});
//$(document).ready(function() {


$('#other_expenses_2009 , #sales_2009').change(function() {
    var calculate_sale = (parseFloat($('  #other_expenses_2009 ').val()) * parseFloat($(' #sales_2009 ').val())) / 100;
    $('#other_expenses_calc_2009').val(calculate_sale.toFixed(2));
});

$('#rooms_occupied_2009 , #average_room_rate_2009 ,#payroll_expense_percent_2009, #sales_2009, #other_expenses_2009').change(function() {
    var department_profit = (parseFloat($(' #pnl_room #sales ').val()) - parseFloat($(' #pnl_room #total_expense ').val())) ;
    $('#department_profit_2009').val(department_profit.toFixed(2));
});

//});
////////// Food and Beverage Department
var total_cover, average_spend_food, food_sales;
total_cover = $('#total_cover_2009').val();
average_spend_food = $('#average_spend_food_2009').val();
food_sales = (parseFloat(total_cover) * parseFloat(average_spend_food)) / 1000;
//food_sales = CurrencyFormat(food_sales);
$('#food_sales_2009').val(food_sales.toFixed(2));

$('#total_cover_2009 , #average_spend_food_2009').change(function() {
    var food_sales = (parseFloat($(' #total_cover_2009 ').val()) * parseFloat($(' #average_spend_food_2009 ').val())) / 1000;
    //food_sales = CurrencyFormat(food_sales);
    $('#food_sales_2009').val(food_sales.toFixed(2));
});

average_spend_beverages = $('#average_spend_beverages_2009').val();
beverage_sales = (parseFloat(total_cover) * parseFloat(average_spend_beverages)) / 1000;
//beverage_sales = CurrencyFormat(beverage_sales);
$('#beverage_sales_2009').val(beverage_sales.toFixed(2));

$('#average_spend_beverages_2009').change(function() {
    var beverage_sales = (parseFloat($(' #total_cover_2009 ').val()) * parseFloat($(' #average_spend_beverages_2009 ').val())) / 1000;
   // beverage_sales = CurrencyFormat(beverage_sales);
    $('#beverage_sales_2009').val(beverage_sales.toFixed(2));
});

var total_sales_fnb, fnb_other_income;
fnb_other_income = $('#fnb_other_income_2009').val();
total_sales_fnb = parseFloat(food_sales) + parseFloat(beverage_sales) + parseFloat(fnb_other_income);
$('#total_sales_fnb_2009').val(total_sales_fnb.toFixed(2));

$('#fnb_other_income_2009').change(function() {
    var total_sales_fnb = (parseFloat($(' #food_sales_2009 ').val()) + parseFloat($(' #beverage_sales_2009 ').val()) +  parseFloat($(' #fnb_other_income_2009 ').val()));
    $('#total_sales_fnb_2009').val(total_sales_fnb.toFixed(2));
});

var food_cost_calc, food_cost_percent;
food_cost_percent = $('#food_cost_percent_2009').val();
food_cost_calc = (parseFloat(food_sales) * parseFloat(food_cost_percent) ) / 100 ;
$('#food_cost_calc_2009').val(food_cost_calc.toFixed(2));

$('#food_cost_percent_2009').change(function() {
    var food_cost_calc = (parseFloat($(' #food_sales_2009 ').val()) * parseFloat($(' #food_cost_percent_2009 ').val()) ) / 100 ;
    $('#food_cost_calc_2009').val(food_cost_calc.toFixed(2));
});

var beverage_cost_calc, beverage_cost_percent;
beverage_cost_percent = $('#beverage_cost_percent_2009').val();
beverage_cost_calc = (parseFloat(beverage_sales) * parseFloat(beverage_cost_percent) ) / 100 ;
$('#beverage_cost_calc_2009').val(beverage_cost_calc.toFixed(2));

$('#beverage_cost_percent_2009').change(function() {
    var beverage_cost_calc = (parseFloat($(' #food_sales_2009 ').val()) * parseFloat($(' #beverage_cost_percent_2009 ').val()) ) / 100 ;
    $('#beverage_cost_calc_2009').val(beverage_cost_calc.toFixed(2));
});
//
//
var other_income_fnb_calc, other_income_fnb;
other_income_fnb = $('#other_income_fnb_2009').val();
if(other_income_fnb == '0.0') { 
    other_income_fnb_calc = '0.0'; 
} else {
    other_expenses_calc = (parseFloat(beverage_sales) * parseFloat(other_income_fnb) ) / 100 ;
}
$('#other_income_fnb_calc_2009').val(other_income_fnb_calc);
$('#other_income_fnb_2009').change(function() {
    var other_income_fnb_calc = (parseFloat($(' #food_sales_2009 ').val()) * parseFloat($(' #other_income_fnb_calc_2009 ').val()) ) / 100 ;
    $('#other_income_fnb_calc_2009').val(beverage_cost_calc.toFixed(2));
});
//

var total_cost_sales_fnb;
total_cost_sales_fnb = parseFloat(food_cost_calc) + parseFloat(beverage_cost_calc) + parseFloat(other_income_fnb)  ;
$('#total_cost_sales_fnb_2009').val(total_cost_sales_fnb.toFixed(2));

//
var payroll_expense_fnb , payroll_expense_fnb_calc;
payroll_expense_fnb = $('#payroll_expense_fnb_2009').val();
payroll_expense_fnb_calc = (parseFloat(total_sales_fnb) * parseFloat(payroll_expense_fnb) ) /100  ;
$('#payroll_expense_fnb_calc_2009').val(payroll_expense_fnb_calc.toFixed(2));

$('#payroll_expense_fnb_2009').change(function() {
    var payroll_expense_fnb_calc = (parseFloat($(' #total_sales_fnb_2009 ').val()) * parseFloat($(' #payroll_expense_fnb_2009 ').val()) ) / 100 ;
    $('#payroll_expense_fnb_calc_2009').val(payroll_expense_fnb_calc.toFixed(2));
});

var other_expenses_fnb , other_expenses_fnb_calc;
other_expenses_fnb = $('#other_expenses_fnb_2009').val();
other_expenses_fnb_calc = (parseFloat(total_sales_fnb) * parseFloat(other_expenses_fnb) ) /100  ;
$('#other_expenses_fnb_calc_2009').val(other_expenses_fnb_calc.toFixed(2));
//
$('#other_expenses_fnb_2009').change(function() {
    var other_expenses_fnb_calc = (parseFloat($(' #total_sales_fnb_2009 ').val()) * parseFloat($(' #other_expenses_fnb_2009 ').val()) ) / 100 ;
    $('#other_expenses_fnb_calc_2009').val(other_expenses_fnb_calc.toFixed(2));
});
//
var total_cost_fnb;
total_cost_sales_fnb = $('#total_cost_sales_fnb_2009').val();
payroll_expense_fnb = $('#payroll_expense_fnb_2009').val();
other_expenses_fnb = $('#other_expenses_fnb_2009').val();
total_cost_fnb = (parseFloat(total_cost_sales_fnb) + parseFloat(payroll_expense_fnb_calc) + parseFloat(other_expenses_fnb_calc) )  ;
$('#total_cost_fnb_2009').val(total_cost_fnb.toFixed(2));
//
$('#other_expenses_fnb_2009, #payroll_expense_fnb_2009, #beverage_cost_percent_2009, #food_cost_percent_2009, #fnb_other_income_2009, #total_cover_2009 , #average_spend_food_2009, #average_spend_beverages_2009').change(function() {
    var total_cost_fnb = (parseFloat($(' #total_cost_sales_fnb_2009 ').val()) + parseFloat($(' #payroll_expense_fnb_calc_2009 ').val()) + parseFloat($(' #other_expenses_fnb_calc_2009 ').val())  ) ;
    $('#total_cost_fnb_2009').val(total_cost_fnb.toFixed(2));
});

var dep_profit_fnb;
dep_profit_fnb = parseFloat(total_sales_fnb) - parseFloat(total_cost_fnb);
$(' #dep_profit_fnb_2009 ').val(dep_profit_fnb.toFixed(2));

$('#other_expenses_fnb_2009, #payroll_expense_fnb_2009, #beverage_cost_percent_2009, #food_cost_percent_2009, #fnb_other_income_2009, #total_cover_2009 , #average_spend_food_2009, #average_spend_beverages_2009').change(function() {
    var dep_profit_fnb = (parseFloat($(' #total_sales_fnb_2009 ').val()) - parseFloat($(' #total_cost_fnb_2009 ').val())   ) ;
    $('#dep_profit_fnb_2009').val(dep_profit_fnb.toFixed(2));
});
//
//
///////Minor Operating Department
var min_op_sales, min_op_cost_sales_percent, min_op_cost_sales_calc;
min_op_sales = $('#min_op_sales_2009').val();
min_op_cost_sales_percent = $('#min_op_cost_sales_percent_2009').val();
min_op_cost_sales_calc = (parseFloat(min_op_sales) * parseFloat(min_op_cost_sales_percent) ) /100  ;
$('#min_op_cost_sales_calc_2009').val(min_op_cost_sales_calc.toFixed(2));

$('#min_op_sales, #min_op_cost_sales_percent_2009').change(function() {
    var min_op_cost_sales_calc = (parseFloat($(' #min_op_sales ').val()) * parseFloat($(' #min_op_cost_sales_percent_2009 ').val()) ) / 100 ;
    $('#min_op_cost_sales_calc_2009').val(min_op_cost_sales_calc.toFixed(2));
});

var min_op_dep_profit;
min_op_dep_profit = (parseFloat(min_op_sales) - parseFloat(min_op_cost_sales_calc) )  ;
$('#min_op_dep_profit_2009').val(min_op_dep_profit.toFixed(2));

$('#min_op_sales, #min_op_cost_sales_percent_2009').change(function() {
    var min_op_dep_profit = (parseFloat($(' #min_op_sales_2009 ').val()) - parseFloat($(' #min_op_cost_sales_calc_2009 ').val()) ) ;
    $('#min_op_dep_profit_2009').val(min_op_dep_profit.toFixed(2));
});

var min_op_sports_sales, min_op_sports_sales_percent, min_op_sports_sales_calc;
min_op_sports_sales = $('#min_op_sports_sales_2009').val();
min_op_sports_sales_percent = $('#min_op_sports_sales_percent_2009').val();
min_op_sports_sales_calc = (parseFloat(min_op_sports_sales) * parseFloat(min_op_sports_sales_percent) ) /100  ;
$('#min_op_sports_sales_calc_2009').val(min_op_sports_sales_calc.toFixed(2));

$('#min_op_sports_sales_2009, #min_op_sports_sales_percent_2009').change(function() {
    var min_op_sports_sales_calc = (parseFloat($(' #min_op_sports_sales_2009 ').val()) * parseFloat($(' #min_op_sports_sales_percent_2009 ').val()) ) / 100 ;
    $('#min_op_sports_sales_calc_2009').val(min_op_sports_sales_calc.toFixed(2));
});

var min_op_sports_sales_dep_profit;
min_op_sports_sales_dep_profit = (parseFloat(min_op_sports_sales) - parseFloat(min_op_sports_sales_calc) )  ;
$('#min_op_sports_sales_dep_profit_2009').val(min_op_sports_sales_dep_profit.toFixed(2));

$('#min_op_sports_sales_2009, #min_op_sports_sales_percent_2009').change(function() {
    var min_op_sports_sales_dep_profit = (parseFloat($(' #min_op_sports_sales_2009 ').val()) - parseFloat($(' #min_op_sports_sales_calc_2009 ').val()) ) ;
    $('#min_op_sports_sales_dep_profit_2009').val(min_op_sports_sales_dep_profit.toFixed(2));
});


var total_sales_all_dep ,food_sales, min_op_sales, min_op_sports_sales, rental_other_income;
room_sales = $(' #sales_2009 ').val();
food_sales = $(' #food_sales_2009 ').val();
min_op_sales = $(' #min_op_sales_2009 ').val();
min_op_sports_sales = $(' #min_op_sports_sales_2009 ').val();
rental_other_income = $(' #rental_other_income_2009 ').val();
head_office_income = $(' #head_office_income_2009 ').val();
//alert(room_sales);
//alert(food_sales);
//alert(min_op_sales);
//alert(min_op_sports_sales);
//alert(rental_other_income);
//alert($(' #head_office_income_2009 ').val());
total_sales_all_dep = (parseFloat(room_sales) + parseFloat(food_sales) +  parseFloat(min_op_sales) + parseFloat(min_op_sports_sales) + parseFloat(rental_other_income) +  parseFloat(head_office_income))  ;
$('#total_sales_all_dep_2009').val(total_sales_all_dep.toFixed(2));

$('#sales_2009, #food_sales_2009, #min_op_sales_2009, #min_op_sports_sales_2009, #rental_other_income_2009, #head_office_income_2009, #total_sales_all_dep_2009 ').change(function() {
    var total_sales_all_dep = (parseFloat($(' #room_sales_2009 ').val()) + parseFloat($(' #food_sales_2009 ').val()) +  parseFloat($(' #min_op_sales_2009 ').val()) + parseFloat($(' #min_op_sports_sales_2009 ').val()) +  parseFloat($(' #rental_other_income_2009 ').val()) +  parseFloat($(' #head_office_income_2009 ').val()) ) ;
    $('#total_sales_all_dep_2009').val(total_sales_all_dep.toFixed(2));
});
//
var total_sales_all_dep, sales, sales_precentage;
total_sales_all_dep = $(' #total_sales_all_dep_2009 ').val();
sales = $(' #sales_2009 ').val();
//alert(total_sales_all_dep); alert(sales);
//bin2 = $(' #Bin1_Count option:selected ').val();
sales_precentage = (parseFloat(sales) / parseFloat(total_sales_all_dep) ) * 100;
//finalTotal = CurrencyFormat(finalTotal);
$(' #sales_precentage_2009 ').val(sales_precentage.toFixed(2));

var hotel_admin_general, hotel_admin_general_calc;
hotel_admin_general = $('#hotel_admin_general_2009').val();
total_sales_all_dep = $('#total_sales_all_dep_2009').val();
hotel_admin_general_calc = (parseFloat(hotel_admin_general) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#hotel_admin_general_calc_2009').val(hotel_admin_general_calc.toFixed(2));

$('#hotel_admin_general_2009, #total_sales_all_dep_2009').change(function() {
    var hotel_admin_general_calc = (parseFloat($(' #hotel_admin_general_2009 ').val()) / 100 ) * parseFloat($(' #total_sales_all_dep_2009 ').val())  ;
    $('#hotel_admin_general_calc_2009').val(hotel_admin_general_calc.toFixed(2));
});
//
var local_sales_marketing, local_sales_marketing_calc;
local_sales_marketing = $('#local_sales_marketing_2009').val();
total_sales_all_dep = $('#total_sales_all_dep_2009').val();
local_sales_marketing_calc = (parseFloat(local_sales_marketing) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#local_sales_marketing_calc_2009').val(local_sales_marketing_calc.toFixed(2));

$('#local_sales_marketing_2009, #total_sales_all_dep_2009').change(function() {
    var local_sales_marketing_calc = (parseFloat($(' #local_sales_marketing_2009 ').val()) / 100 ) * parseFloat($(' #total_sales_all_dep_2009 ').val())  ;
    $('#local_sales_marketing_calc_2009').val(local_sales_marketing_calc.toFixed(2));
});
//
var energy_costs, energy_costs_calc;
energy_costs = $('#energy_costs_2009').val();
total_sales_all_dep = $('#total_sales_all_dep_2009').val();
energy_costs_calc = (parseFloat(energy_costs) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#energy_costs_calc_2009').val(energy_costs_calc.toFixed(2));
//
$('#energy_costs_2009, #total_sales_all_dep_2009').change(function() {
    var energy_costs_calc = (parseFloat($(' #energy_costs_2009 ').val()) / 100 ) * parseFloat($(' #total_sales_all_dep_2009 ').val())  ;
    $('#energy_costs_calc_2009').val(energy_costs_calc.toFixed(2));
});
//
var repair_maintence, repair_maintence_calc;
repair_maintence = $('#repair_maintence_2009').val();
total_sales_all_dep = $('#total_sales_all_dep_2009').val();
repair_maintence_calc = (parseFloat(repair_maintence) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#repair_maintence_calc_2009').val(repair_maintence_calc.toFixed(2));
//
$('#repair_maintence_2009, #total_sales_all_dep_2009').change(function() {
    var repair_maintence_calc = (parseFloat($(' #repair_maintence_2009 ').val()) / 100 ) * parseFloat($(' #total_sales_all_dep_2009 ').val())  ;
    $('#repair_maintence_calc_2009').val(repair_maintence_calc.toFixed(2));
});

var real_estate_taxes, real_estate_taxes_calc;
real_estate_taxes = $('#real_estate_taxes_2009').val();
total_sales_all_dep = $('#total_sales_all_dep_2009').val();
real_estate_taxes_calc = (parseFloat(real_estate_taxes) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#real_estate_taxes_calc_2009').val(real_estate_taxes_calc.toFixed(2));
//
$('#real_estate_taxes_2009, #total_sales_all_dep_2009').change(function() {
    var real_estate_taxes_calc = (parseFloat($(' #real_estate_taxes_2009 ').val()) / 100 ) * parseFloat($(' #total_sales_all_dep_2009 ').val())  ;
    $('#real_estate_taxes_calc_2009').val(real_estate_taxes_calc.toFixed(2));
});
//
room_department_profit = $('  #department_profit_2009 ').val();
dep_profit_fnb = $(' #dep_profit_fnb_2009 ').val();
min_op_dep_profit = $(' #min_op_dep_profit_2009 ').val();
min_op_sports_sales_dep_profit = $(' #min_op_sports_sales_dep_profit_2009 ').val();
rental_other_income = $(' #rental_other_income_2009 ').val();
head_office_income = $(' #head_office_income_2009 ').val();
total_gross_income = (parseFloat(room_department_profit) + parseFloat(dep_profit_fnb) +  parseFloat(min_op_dep_profit) + parseFloat(min_op_sports_sales_dep_profit) + parseFloat(rental_other_income) +  parseFloat(head_office_income))  ;
$('#total_gross_income_2009').val(total_gross_income.toFixed(2));
//
var total_gross_income , income_bef_fix_charges;
total_gross_income = $(' #total_gross_income_2009 ').val();
hotel_admin_general_calc = $(' #hotel_admin_general_calc_2009 ').val();
local_sales_marketing_calc = $(' #local_sales_marketing_calc_2009 ').val();
energy_costs_calc = $(' #energy_costs_calc_2009 ').val();
repair_maintence_calc = $(' #repair_maintence_calc_2009 ').val();
real_estate_taxes_calc = $(' #real_estate_taxes_calc_2009 ').val();
income_bef_fix_charges = (parseFloat(total_gross_income) - parseFloat(hotel_admin_general_calc) -  parseFloat(local_sales_marketing_calc) - parseFloat(energy_costs_calc) - parseFloat(repair_maintence_calc) -  parseFloat(real_estate_taxes_calc))  ;
$('#income_bef_fix_charges_2009').val(income_bef_fix_charges.toFixed(2));


$('#real_estate_taxes_2009, #total_sales_all_dep_2009').change(function() {
    var real_estate_taxes_calc = (parseFloat($(' #real_estate_taxes_2009 ').val()) / 100 ) * parseFloat($(' #total_sales_all_dep_2009 ').val())  ;
    $('#real_estate_taxes_calc_2009').val(real_estate_taxes_calc.toFixed(2));
});
//
var admin_finance_ho, admin_finance_ho_calc;
admin_finance_ho = $('#admin_finance_ho_2009').val();
total_sales_all_dep = $('#total_sales_all_dep_2009').val();
admin_finance_ho_calc = (parseFloat(admin_finance_ho) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#admin_finance_ho_calc_2009').val(admin_finance_ho_calc.toFixed(2));
//
$('#admin_finance_ho_2009, #total_sales_all_dep_2009').change(function() {
    var admin_finance_ho_calc = (parseFloat($(' #admin_finance_ho_2009 ').val()) / 100 ) * parseFloat($(' #total_sales_all_dep_2009 ').val())  ;
    $('#admin_finance_ho_calc_2009').val(admin_finance_ho_calc.toFixed(2));
});
//
var marketing_ho, marketing_ho_calc;
marketing_ho = $('#marketing_ho_2009').val();
total_sales_all_dep = $('#total_sales_all_dep_2009').val();
marketing_ho_calc = (parseFloat(marketing_ho) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#marketing_ho_calc_2009').val(marketing_ho_calc.toFixed(2));
//
$('#marketing_ho_2009, #total_sales_all_dep_2009').change(function() {
    var marketing_ho_calc = (parseFloat($(' #marketing_ho_2009 ').val()) / 100 ) * parseFloat($(' #total_sales_all_dep_2009 ').val())  ;
    $('#marketing_ho_calc_2009').val(marketing_ho_calc.toFixed(2));
});
//
var management_fee, management_fee_calc;
management_fee = $('#management_fee_2009').val();
total_sales_all_dep = $('#total_sales_all_dep_2009').val();
management_fee_calc = (parseFloat(management_fee) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#management_fee_calc_2009').val(management_fee_calc.toFixed(2));
//
$('#management_fee_2009, #total_sales_all_dep_2009').change(function() {
    var management_fee_calc = (parseFloat($(' #management_fee_2009 ').val()) / 100 ) * parseFloat($(' #total_sales_all_dep_2009 ').val())  ;
    $('#management_fee_calc_2009').val(management_fee_calc.toFixed(2));
});
//
var head_office_charges;
head_office_charges = (parseFloat(management_fee_calc)   + parseFloat(marketing_ho_calc) + parseFloat(admin_finance_ho_calc) ) ;
$('#head_office_charges_2009').val(head_office_charges.toFixed(2));

$('#management_fee_calc_2009, #marketing_ho_calc_2009, #admin_finance_ho_calc_2009').change(function() {
    var head_office_charges = (parseFloat($(' #management_fee_calc_2009 ').val())   +  parseFloat($(' #marketing_ho_calc_2009 ').val() ) +  parseFloat($(' #admin_finance_ho_calc_2009 ').val()  ) )  ;
    $('#head_office_charges_2009').val(head_office_charges.toFixed(2));
});
//
var ebidat_field;
income_bef_fix_charges  = $('#income_bef_fix_charges_2009').val();
ebidat_field = (parseFloat(income_bef_fix_charges)   -  parseFloat(head_office_charges)  ) ;
$('#ebidat_field_2009').val(ebidat_field.toFixed(2));

var depreciation_field_calc;
depreciation_field  = $('#depreciation_field').val();
total_sales_all_dep = $('#total_sales_all_dep_2009').val();
depreciation_field_calc = (parseFloat(depreciation_field) / 10000 ) * parseFloat(total_sales_all_dep) ;
$('#depreciation_field_calc_2009').val(depreciation_field_calc.toFixed(2));
//

$('#depreciation_field, #total_sales_all_dep_2009').change(function() {
    var depreciation_field_calc = (parseFloat($(' #depreciation_field_2009 ').val()) / 10000 ) * parseFloat($(' #total_sales_all_dep_2009 ').val())  ;
    $('#depreciation_field_calc_2009').val(depreciation_field_calc.toFixed(2));
});
var amortization_field_calc;
amortization_field  = $('#amortization_field').val();
total_sales_all_dep = $('#total_sales_all_dep_2009').val();
amortization_field_calc = (parseFloat(amortization_field) / 10000 ) * parseFloat(total_sales_all_dep) ;
$('#amortization_field_calc_2009').val(amortization_field_calc.toFixed(2));
//
//
$('#amortization_field, #total_sales_all_dep').change(function() {
    var amortization_field_calc = (parseFloat($(' #amortization_field ').val()) / 10000 ) * parseFloat($(' #total_sales_all_dep ').val())  ;
    $('#amortization_field_calc_2009').val(amortization_field_calc.toFixed(2));
});
//
var pbt_field;
depreciation_field_calc  = $('#depreciation_field_calc_2009').val();
amortization_field_calc  = $('#amortization_field_calc_2009').val();
ebidat_field  = $('#ebidat_field_2009').val();
pbt_field = (parseFloat(ebidat_field)   -  parseFloat(depreciation_field_calc) -  parseFloat(amortization_field_calc)  ) ;
$('#pbt_field_2009').val(pbt_field.toFixed(2));
//
//
var taxation_calc;
taxation  = $('#taxation').val();
pbt_field = $('#pbt_field_2009').val();
taxation_calc = (parseFloat(pbt_field)  ) * (parseFloat(taxation) /100) ;
$('#taxation_calc_2009').val(taxation_calc.toFixed(2));
//
//
$('#taxation').change(function() {
    taxation  = $('#taxation').val();
pbt_field = $('#pbt_field_2009').val();
   var taxation_calc = (parseFloat(pbt_field)  ) * (parseFloat(taxation) /100) ;
    $('#taxation_calc_2009').val(taxation_calc.toFixed(2));
});
//
var net_profit_loss;
taxation_calc  = $('#taxation_calc_2009').val();
pbt_field = $('#pbt_field_2009').val();
net_profit_loss = (parseFloat(pbt_field)   -  parseFloat(taxation_calc)  ) ;
$('#net_profit_loss_2009').val(net_profit_loss.toFixed(2));
//
$('#taxation').change(function() {
    taxation_calc  = $('#taxation_calc_2009').val();
    pbt_field = $('#pbt_field_2009').val();
   var net_profit_loss = (parseFloat(pbt_field) - parseFloat(taxation_calc) ) ;
    $('#net_profit_loss_2009').val(net_profit_loss.toFixed(2));
});
//
//
//function CurrencyFormat(number)
//{
//   var decimalplaces = 2;
//   var decimalcharacter = ".";
//   var thousandseparater = ",";
//   number = parseFloat(number);
//   var sign = number < 0 ? "-" : "";
//   var formatted = new String(number.toFixed(decimalplaces));
//   if( decimalcharacter.length && decimalcharacter != "." ) { formatted = formatted.replace(/\./,decimalcharacter); }
//   var integer = "";
//   var fraction = "";
//   var strnumber = new String(formatted);
//   var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : -1;
//   if( dotpos > -1 )
//   {
//      if( dotpos ) { integer = strnumber.substr(0,dotpos); }
//      fraction = strnumber.substr(dotpos+1);
//   }
//   else { integer = strnumber; }
//   if( integer ) { integer = String(Math.abs(integer)); }
//   while( fraction.length < decimalplaces ) { fraction += "0"; }
//   temparray = new Array();
//   while( integer.length > 3 )
//   {
//      temparray.unshift(integer.substr(-3));
//      integer = integer.substr(0,integer.length-3);
//   }
//   temparray.unshift(integer);
//   integer = temparray.join(thousandseparater);
//   return sign + integer + decimalcharacter + fraction;
//}
//
/////Precentage Calculation/////
//
//
var total_sales_all_dep, sales, sales_precentage;
total_sales_all_dep = $(' #total_sales_all_dep_2009 ').val();
sales = $(' #sales_2009 ').val();
//alert(bin1); alert(bin2);
//bin2 = $(' #Bin1_Count option:selected ').val();
sales_precentage = (parseFloat(sales) / parseFloat(total_sales_all_dep) ) * 100;
//finalTotal = CurrencyFormat(finalTotal);
$(' #pnl_room #sales_precentage_2009 ').val(sales_precentage.toFixed(2));
//
var department_profit, sales, department_profit_precentage;
department_profit = $(' #department_profit_2009 ').val();
sales = $(' #pnl_room #sales_2009 ').val();
//alert(bin1); alert(bin2);
//bin2 = $(' #Bin1_Count option:selected ').val();
department_profit_precentage = (parseFloat(department_profit) / parseFloat(sales) ) * 100;
//finalTotal = CurrencyFormat(finalTotal);
$(' #department_profit_precentage_2009 ').val(department_profit_precentage.toFixed(2));
//
//
var total_sales_all_dep, food_sales, food_sales_percent;
total_sales_all_dep = $(' #total_sales_all_dep_2009 ').val();
food_sales = $(' #food_sales_2009 ').val();
//alert(bin1); alert(bin2);
//bin2 = $(' #Bin1_Count option:selected ').val();
food_sales_percent = (parseFloat(food_sales) / parseFloat(total_sales_all_dep) ) * 100;
//finalTotal = CurrencyFormat(finalTotal);
$(' #food_sales_percent_2009 ').val(food_sales_percent.toFixed(2));
//
var total_sales_all_dep, beverage_sales, beverage_sales_percent;
total_sales_all_dep = $(' #total_sales_all_dep_2009 ').val();
beverage_sales = $(' #food_sales_2009 ').val();
//alert(bin1); alert(bin2);
//bin2 = $(' #Bin1_Count option:selected ').val();
beverage_sales_percent = (parseFloat(beverage_sales) / parseFloat(total_sales_all_dep) ) * 100;
//finalTotal = CurrencyFormat(finalTotal);
$(' #beverage_sales_percent_2009 ').val(beverage_sales_percent.toFixed(2));
//
var total_sales_all_dep, fnb_other_income, fnb_other_income_percent;
total_sales_all_dep = $(' #total_sales_all_dep_2009 ').val();
fnb_other_income = $(' #food_sales_2009 ').val();
//alert(bin1); alert(bin2);
//bin2 = $(' #Bin1_Count option:selected ').val();
fnb_other_income_percent = (parseFloat(fnb_other_income) / parseFloat(total_sales_all_dep) ) * 100;
//finalTotal = CurrencyFormat(finalTotal);
$(' #fnb_other_income_percent_2009 ').val(fnb_other_income_percent.toFixed(2));
//
var total_sales_fnb, total_cost_sales_fnb, total_cost_sales_fnb_percent;
total_sales_fnb = $(' #total_sales_fnb_2009 ').val();
total_cost_sales_fnb = $(' #total_cost_sales_fnb_2009 ').val();
//alert(bin1); alert(bin2);
//bin2 = $(' #Bin1_Count option:selected ').val();
total_cost_sales_fnb_percent = (parseFloat(total_cost_sales_fnb) / parseFloat(total_sales_fnb) ) * 100;
//finalTotal = CurrencyFormat(finalTotal);
$(' #total_cost_sales_fnb_percent_2009 ').val(total_cost_sales_fnb_percent.toFixed(2));
//
var total_sales_fnb, dep_profit_fnb, dep_profit_fnb_percent;
total_sales_fnb = $(' #total_sales_fnb_2009 ').val();
dep_profit_fnb = $(' #dep_profit_fnb_2009 ').val();
//alert(bin1); alert(bin2);
//bin2 = $(' #Bin1_Count option:selected ').val();
dep_profit_fnb_percent = (parseFloat(dep_profit_fnb) / parseFloat(total_sales_fnb) ) * 100;
//finalTotal = CurrencyFormat(finalTotal);
$(' #dep_profit_fnb_percent_2009 ').val(dep_profit_fnb_percent.toFixed(2));
//
var min_op_sales, total_sales_all_dep, min_op_sales_percent;
total_sales_all_dep = $(' #total_sales_all_dep_2009 ').val();
min_op_sales = $(' #min_op_sales_2009 ').val();
//alert(bin1); alert(bin2);
//bin2 = $(' #Bin1_Count option:selected ').val();
min_op_sales_percent = (parseFloat(min_op_sales) / parseFloat(total_sales_all_dep) ) * 100;
//finalTotal = CurrencyFormat(finalTotal);
$(' #min_op_sales_percent_2009 ').val(min_op_sales_percent.toFixed(2));
//
var min_op_dep_profit, min_op_sales, min_op_dep_profit_percent;
min_op_sales = $(' #min_op_sales_2009 ').val();
min_op_dep_profit = $(' #min_op_dep_profit_2009 ').val();
//alert(bin1); alert(bin2);
//bin2 = $(' #Bin1_Count option:selected ').val();
min_op_dep_profit_percent = (parseFloat(min_op_dep_profit) / parseFloat(min_op_sales) ) * 100;
//finalTotal = CurrencyFormat(finalTotal);
$(' #min_op_dep_profit_percent_2009 ').val(min_op_dep_profit_percent.toFixed(2));
//
//
var min_op_sports_sales, total_sales_all_dep, min_op_sports_sales_percentage;
total_sales_all_dep = $(' #total_sales_all_dep_2009 ').val();
min_op_sports_sales = $(' #min_op_sports_sales_2009 ').val();
//alert(bin1); alert(bin2);
//bin2 = $(' #Bin1_Count option:selected ').val();
min_op_sports_sales_percentage = (parseFloat(min_op_sports_sales) / parseFloat(total_sales_all_dep) ) * 100;
//finalTotal = CurrencyFormat(finalTotal);
$(' #min_op_sports_sales_percentage_2009 ').val(min_op_sports_sales_percentage.toFixed(2));
//
//
//
var min_op_sports_sales_dep_profit, min_op_sports_sales, min_op_sports_sales_dep_profit_percent;
min_op_sports_sales = $(' #min_op_sports_sales_2009 ').val();
min_op_sports_sales_dep_profit = $(' #min_op_sports_sales_dep_profit_2009 ').val();
//alert(bin1); alert(bin2);
//bin2 = $(' #Bin1_Count option:selected ').val();
min_op_sports_sales_dep_profit_percent = (parseFloat(min_op_sports_sales_dep_profit) / parseFloat(min_op_sports_sales) ) * 100;
//finalTotal = CurrencyFormat(finalTotal);
$(' #min_op_sports_sales_dep_profit_percent_2009 ').val(min_op_sports_sales_dep_profit_percent.toFixed(2));
//
//
var rental_other_income, total_sales_all_dep, rental_other_income_percent;
total_sales_all_dep = $(' #total_sales_all_dep_2009 ').val();
rental_other_income = $(' #rental_other_income_2009 ').val();
rental_other_income_percent = (parseFloat(rental_other_income) / parseFloat(total_sales_all_dep) ) * 100;
$(' #rental_other_income_percent_2009 ').val(rental_other_income_percent.toFixed(2));
//
var head_office_income, total_sales_all_dep, head_office_income_percent;
total_sales_all_dep = $(' #total_sales_all_dep_2009 ').val();
head_office_income = $(' #head_office_income_2009 ').val();
head_office_income_percent = (parseFloat(head_office_income) / parseFloat(total_sales_all_dep) ) * 100;
$(' #head_office_income_percent_2009 ').val(head_office_income_percent.toFixed(2));

var total_gross_income, total_sales_all_dep, total_gross_income_percent;
total_sales_all_dep = $(' #total_sales_all_dep_2009 ').val();
total_gross_income = $(' #total_gross_income_2009 ').val();
total_gross_income_percent = (parseFloat(total_gross_income) / parseFloat(total_sales_all_dep) ) * 100;
$(' #total_gross_income_percent_2009 ').val(total_gross_income_percent.toFixed(2));
//
var ebidat_field, total_sales_all_dep, ebidat_field_percent;
total_sales_all_dep = $(' #total_sales_all_dep_2009 ').val();
ebidat_field = $(' #ebidat_field_2009 ').val();
ebidat_field_percent = (parseFloat(ebidat_field) / parseFloat(total_sales_all_dep) ) * 100;
$(' #ebidat_field_percent_2009 ').val(ebidat_field_percent.toFixed(2));
//
var pbt_field, total_sales_all_dep, pbt_field_percent;
total_sales_all_dep = $(' #total_sales_all_dep_2009 ').val();
pbt_field = $(' #pbt_field_2009 ').val();
pbt_field_percent = (parseFloat(pbt_field) / parseFloat(total_sales_all_dep) ) * 100;
$(' #pbt_field_percent_2009 ').val(pbt_field_percent.toFixed(2));
//
var net_profit_loss, total_sales_all_dep, net_profit_loss_percent;
total_sales_all_dep = $(' #total_sales_all_dep_2009 ').val();
net_profit_loss = $(' #net_profit_loss_2009 ').val();
net_profit_loss_percent = (parseFloat(net_profit_loss) / parseFloat(total_sales_all_dep) ) * 100;
$(' #net_profit_loss_percent_2009 ').val(net_profit_loss_percent.toFixed(2));
//
//
//
//
