//$(document).ready(function() {
var bin1, bin2, finalTotal;
bin1 = $(' #rooms_occupied ').val();
bin2 = $('  #average_room_rate ').val();
//alert(bin1); alert(bin2);
//bin2 = $(' #Bin1_Count option:selected ').val();
finalTotal = (parseFloat(bin1) * parseFloat(bin2)) / 1000;
$(' #sales ').val(finalTotal);
document.getElementById("sales_container").innerHTML = finalTotal.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});

var payroll_expense_percent, sales, expense_calc;
payroll_expense_percent = $(' #payroll_expense_percent ').val();
sales = $('  #sales ').val();
expense_calc = (parseFloat(payroll_expense_percent) * parseFloat(sales)) / 100;
$(' #payroll_expense_calc ').val(expense_calc);
document.getElementById("expense_calc_container").innerHTML = expense_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});

var other_expenses, other_expenses_calc;
other_expenses = $(' #other_expenses ').val();
sales = $('  #sales ').val();
other_expenses_calc = (parseFloat(other_expenses) * parseFloat(sales)) / 100;
$('  #other_expenses_calc ').val(other_expenses_calc);
document.getElementById("other_expenses_calc_container").innerHTML = other_expenses_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});

var total_expense;
total_expense = parseFloat(expense_calc) + parseFloat(other_expenses_calc);
$('  #total_expense ').val(total_expense.toFixed(2));
document.getElementById("total_expense_container").innerHTML = total_expense.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});

var department_profit;
department_profit = parseFloat(sales) - parseFloat(total_expense);
$(' #department_profit ').val(department_profit.toFixed(2));
document.getElementById("department_profit_container").innerHTML = department_profit.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});

//});
//$(document).ready(function() {

//});
//////// Food and Beverage Department
var total_cover, average_spend_food, food_sales;
total_cover = $('#total_cover').val();
average_spend_food = $('#average_spend_food').val();
food_sales = (parseFloat(total_cover) * parseFloat(average_spend_food)) / 1000;
//food_sales = CurrencyFormat(food_sales);
$('#food_sales').val(food_sales.toFixed(2));
document.getElementById("food_sales_container").innerHTML = food_sales.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});




average_spend_beverages = $('#average_spend_beverages').val();
beverage_sales = (parseFloat(total_cover) * parseFloat(average_spend_beverages)) / 1000;
//beverage_sales = CurrencyFormat(beverage_sales);
$('#beverage_sales').val(beverage_sales.toFixed(2));
document.getElementById("beverage_sales_container").innerHTML = beverage_sales.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});

var total_sales_fnb, fnb_other_income;
fnb_other_income = $('#fnb_other_income').val();
total_sales_fnb = parseFloat(food_sales) + parseFloat(beverage_sales) + parseFloat(fnb_other_income);
$('#total_sales_fnb').val(total_sales_fnb.toFixed(2));
document.getElementById("fnb_other_income_container").innerHTML = fnb_other_income;
document.getElementById("total_sales_fnb_container").innerHTML = total_sales_fnb.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});




var food_cost_calc, food_cost_percent;
food_cost_percent = $('#food_cost_percent').val();
food_cost_calc = (parseFloat(food_sales) * parseFloat(food_cost_percent) ) / 100 ;
$('#food_cost_calc').val(food_cost_calc.toFixed(2));
document.getElementById("food_cost_calc_container").innerHTML = food_cost_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


var beverage_cost_calc, beverage_cost_percent;
beverage_cost_percent = $('#beverage_cost_percent').val();
beverage_cost_calc = (parseFloat(beverage_sales) * parseFloat(beverage_cost_percent) ) / 100 ;
$('#beverage_cost_calc').val(beverage_cost_calc.toFixed(2));
document.getElementById("beverage_cost_calc_container").innerHTML = beverage_cost_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});

var other_income_fnb_calc, other_income_fnb;
other_income_fnb = $('#other_income_fnb').val();
if(other_income_fnb == '0.0') { 
    other_income_fnb_calc = '0.0'; 
} else {
    other_expenses_calc = (parseFloat(beverage_sales) * parseFloat(other_income_fnb) ) / 100 ;
}
$('#other_income_fnb_calc').val(other_income_fnb_calc);
document.getElementById("other_income_fnb_calc_container").innerHTML = other_income_fnb_calc;


var total_cost_sales_fnb;
total_cost_sales_fnb = parseFloat(food_cost_calc) + parseFloat(beverage_cost_calc) + parseFloat(other_income_fnb)  ;
$('#total_cost_sales_fnb').val(total_cost_sales_fnb.toFixed(2));
document.getElementById("total_cost_sales_fnb_container").innerHTML = total_cost_sales_fnb.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


var payroll_expense_fnb , payroll_expense_fnb_calc;
payroll_expense_fnb = $('#payroll_expense_fnb').val();
payroll_expense_fnb_calc = (parseFloat(total_sales_fnb) * parseFloat(payroll_expense_fnb) ) /100  ;
$('#payroll_expense_fnb_calc').val(payroll_expense_fnb_calc.toFixed(2));
document.getElementById("payroll_expense_fnb_calc_container").innerHTML = payroll_expense_fnb_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});

var other_expenses_fnb , other_expenses_fnb_calc;
other_expenses_fnb = $('#other_expenses_fnb').val();
other_expenses_fnb_calc = (parseFloat(total_sales_fnb) * parseFloat(other_expenses_fnb) ) /100  ;
$('#other_expenses_fnb_calc').val(other_expenses_fnb_calc.toFixed(2));
document.getElementById("other_expenses_fnb_calc_container").innerHTML = other_expenses_fnb_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


var total_cost_fnb;
total_cost_sales_fnb = $('#total_cost_sales_fnb').val();
payroll_expense_fnb = $('#payroll_expense_fnb').val();
other_expenses_fnb = $('#other_expenses_fnb').val();
total_cost_fnb = (parseFloat(total_cost_sales_fnb) + parseFloat(payroll_expense_fnb_calc) + parseFloat(other_expenses_fnb_calc) )  ;
$('#total_cost_fnb').val(total_cost_fnb.toFixed(2));
document.getElementById("total_cost_fnb_container").innerHTML = total_cost_fnb.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});



var dep_profit_fnb;
dep_profit_fnb = parseFloat(total_sales_fnb) - parseFloat(total_cost_fnb);
$(' #dep_profit_fnb ').val(dep_profit_fnb.toFixed(2));
document.getElementById("dep_profit_fnb_container").innerHTML = dep_profit_fnb.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


/////Minor Operating Department
var min_op_sales, min_op_cost_sales_percent, min_op_cost_sales_calc;
min_op_sales = $('#min_op_sales').val();
min_op_cost_sales_percent = $('#min_op_cost_sales_percent').val();
min_op_cost_sales_calc = (parseFloat(min_op_sales) * parseFloat(min_op_cost_sales_percent) ) /100  ;
$('#min_op_cost_sales_calc').val(min_op_cost_sales_calc.toFixed(2));
document.getElementById("min_op_sales_container").innerHTML = min_op_sales;
document.getElementById("min_op_cost_sales_calc_container").innerHTML = min_op_cost_sales_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});



var min_op_dep_profit;
min_op_dep_profit = (parseFloat(min_op_sales) - parseFloat(min_op_cost_sales_calc) )  ;
$('#min_op_dep_profit').val(min_op_dep_profit.toFixed(2));
document.getElementById("min_op_dep_profit_container").innerHTML = min_op_dep_profit.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


var min_op_sports_sales, min_op_sports_sales_percent, min_op_sports_sales_calc;
min_op_sports_sales = $('#min_op_sports_sales').val();
min_op_sports_sales_percent = $('#min_op_sports_sales_percent').val();
min_op_sports_sales_calc = (parseFloat(min_op_sports_sales) * parseFloat(min_op_sports_sales_percent) ) /100  ;
$('#min_op_sports_sales_calc').val(min_op_sports_sales_calc.toFixed(2));
document.getElementById("min_op_sports_sales_container").innerHTML = min_op_sports_sales;
document.getElementById("min_op_sports_sales_calc_container").innerHTML = min_op_sports_sales_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


var min_op_sports_sales_dep_profit;
min_op_sports_sales_dep_profit = (parseFloat(min_op_sports_sales) - parseFloat(min_op_sports_sales_calc) )  ;
$('#min_op_sports_sales_dep_profit').val(min_op_sports_sales_dep_profit.toFixed(2));
document.getElementById("min_op_sports_sales_dep_profit_container").innerHTML = min_op_sports_sales_dep_profit.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});








var total_sales_all_dep ,food_sales, min_op_sales, min_op_sports_sales, rental_other_income;
room_sales = $(' #sales ').val();
food_sales = $(' #food_sales ').val();
min_op_sales = $(' #min_op_sales ').val();
min_op_sports_sales = $(' #min_op_sports_sales ').val();
rental_other_income = $(' #rental_other_income ').val();
head_office_income = $(' #head_office_income ').val();
total_sales_all_dep = (parseFloat(room_sales) + parseFloat(food_sales) +  parseFloat(min_op_sales) + parseFloat(min_op_sports_sales) + parseFloat(rental_other_income) +  parseFloat(head_office_income))  ;
$('#total_sales_all_dep').val(total_sales_all_dep.toFixed(2));
document.getElementById("total_sales_all_dep_container").innerHTML = total_sales_all_dep.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


document.getElementById("rental_other_income_container").innerHTML = rental_other_income;
document.getElementById("head_office_income_container").innerHTML = head_office_income;



var hotel_admin_general, hotel_admin_general_calc;
hotel_admin_general = $('#hotel_admin_general').val();
total_sales_all_dep = $('#total_sales_all_dep').val();
hotel_admin_general_calc = (parseFloat(hotel_admin_general) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#hotel_admin_general_calc').val(hotel_admin_general_calc.toFixed(2));
document.getElementById("hotel_admin_general_calc_container").innerHTML = hotel_admin_general_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});




var local_sales_marketing, local_sales_marketing_calc;
local_sales_marketing = $('#local_sales_marketing').val();
total_sales_all_dep = $('#total_sales_all_dep').val();
local_sales_marketing_calc = (parseFloat(local_sales_marketing) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#local_sales_marketing_calc').val(local_sales_marketing_calc.toFixed(2));
document.getElementById("local_sales_marketing_calc_container").innerHTML = local_sales_marketing_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


var energy_costs, energy_costs_calc;
energy_costs = $('#energy_costs').val();
total_sales_all_dep = $('#total_sales_all_dep').val();
energy_costs_calc = (parseFloat(energy_costs) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#energy_costs_calc').val(energy_costs_calc.toFixed(2));
document.getElementById("energy_costs_calc_container").innerHTML = energy_costs_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});



var repair_maintence, repair_maintence_calc;
repair_maintence = $('#repair_maintence').val();
total_sales_all_dep = $('#total_sales_all_dep').val();
repair_maintence_calc = (parseFloat(repair_maintence) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#repair_maintence_calc').val(repair_maintence_calc.toFixed(2));
document.getElementById("repair_maintence_calc_container").innerHTML = repair_maintence_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});




var real_estate_taxes, real_estate_taxes_calc;
real_estate_taxes = $('#real_estate_taxes').val();
total_sales_all_dep = $('#total_sales_all_dep').val();
real_estate_taxes_calc = (parseFloat(real_estate_taxes) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#real_estate_taxes_calc').val(real_estate_taxes_calc.toFixed(2));
document.getElementById("real_estate_taxes_calc_container").innerHTML = real_estate_taxes_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


room_department_profit = $(' #department_profit ').val();
dep_profit_fnb = $(' #dep_profit_fnb ').val();
min_op_dep_profit = $(' #min_op_dep_profit ').val();
min_op_sports_sales_dep_profit = $(' #min_op_sports_sales_dep_profit ').val();
rental_other_income = $(' #rental_other_income ').val();
head_office_income = $(' #head_office_income ').val();
total_gross_income = (parseFloat(room_department_profit) + parseFloat(dep_profit_fnb) +  parseFloat(min_op_dep_profit) + parseFloat(min_op_sports_sales_dep_profit) + parseFloat(rental_other_income) +  parseFloat(head_office_income))  ;
$('#total_gross_income').val(total_gross_income.toFixed(2));
document.getElementById("total_gross_income_container").innerHTML = total_gross_income.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});

var total_gross_income , income_bef_fix_charges;
total_gross_income = $(' #total_gross_income ').val();
hotel_admin_general_calc = $(' #hotel_admin_general_calc ').val();
local_sales_marketing_calc = $(' #local_sales_marketing_calc ').val();
energy_costs_calc = $(' #energy_costs_calc ').val();
repair_maintence_calc = $(' #repair_maintence_calc ').val();
real_estate_taxes_calc = $(' #real_estate_taxes_calc ').val();
income_bef_fix_charges = (parseFloat(total_gross_income) - parseFloat(hotel_admin_general_calc) -  parseFloat(local_sales_marketing_calc) - parseFloat(energy_costs_calc) - parseFloat(repair_maintence_calc) -  parseFloat(real_estate_taxes_calc))  ;
$('#income_bef_fix_charges').val(income_bef_fix_charges.toFixed(2));
document.getElementById("income_bef_fix_charges_container").innerHTML = income_bef_fix_charges.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


var admin_finance_ho, admin_finance_ho_calc;
admin_finance_ho = $('#admin_finance_ho').val();
total_sales_all_dep = $('#total_sales_all_dep').val();
admin_finance_ho_calc = (parseFloat(admin_finance_ho) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#admin_finance_ho_calc').val(admin_finance_ho_calc.toFixed(2));
document.getElementById("admin_finance_ho_calc_container").innerHTML = admin_finance_ho_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


var marketing_ho, marketing_ho_calc;
marketing_ho = $('#marketing_ho').val();
total_sales_all_dep = $('#total_sales_all_dep').val();
marketing_ho_calc = (parseFloat(marketing_ho) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#marketing_ho_calc').val(marketing_ho_calc.toFixed(2));
document.getElementById("marketing_ho_calc_container").innerHTML = marketing_ho_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


var management_fee, management_fee_calc;
management_fee = $('#management_fee').val();
total_sales_all_dep = $('#total_sales_all_dep').val();
management_fee_calc = (parseFloat(management_fee) / 100 ) * parseFloat(total_sales_all_dep) ;
$('#management_fee_calc').val(management_fee_calc.toFixed(2));
document.getElementById("management_fee_calc_container").innerHTML = management_fee_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});

var head_office_charges;
head_office_charges = (parseFloat(management_fee_calc)   + parseFloat(marketing_ho_calc) + parseFloat(admin_finance_ho_calc) ) ;
$('#head_office_charges').val(head_office_charges.toFixed(2));
document.getElementById("head_office_charges_container").innerHTML = head_office_charges.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


var ebidat_field;
income_bef_fix_charges  = $('#income_bef_fix_charges').val();
ebidat_field = (parseFloat(income_bef_fix_charges)   -  parseFloat(head_office_charges)  ) ;
$('#ebidat_field').val(ebidat_field.toFixed(2));
document.getElementById("ebidat_field_container").innerHTML = ebidat_field.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


var depreciation_field_calc;
depreciation_field  = $('#depreciation_field').val();
total_sales_all_dep = $('#total_sales_all_dep').val();
depreciation_field_calc = (parseFloat(depreciation_field) / 10000 ) * parseFloat(total_sales_all_dep) ;
$('#depreciation_field_calc').val(depreciation_field_calc.toFixed(2));
document.getElementById("depreciation_field_calc_container").innerHTML = depreciation_field_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});
 
var amortization_field_calc;
amortization_field  = $('#amortization_field').val();
total_sales_all_dep = $('#total_sales_all_dep').val();
amortization_field_calc = (parseFloat(amortization_field) / 10000 ) * parseFloat(total_sales_all_dep) ;
$('#amortization_field_calc').val(amortization_field_calc.toFixed(2));
document.getElementById("amortization_field_calc_container").innerHTML = amortization_field_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});



var pbt_field;
depreciation_field_calc  = $('#depreciation_field_calc').val();
amortization_field_calc  = $('#amortization_field_calc').val();
ebidat_field  = $('#ebidat_field').val();
pbt_field = (parseFloat(ebidat_field)   -  parseFloat(depreciation_field_calc) -  parseFloat(amortization_field_calc)  ) ;
$('#pbt_field').val(pbt_field.toFixed(2));
document.getElementById("pbt_field_container").innerHTML = pbt_field.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});


var taxation_calc;
taxation  = $('#taxation').val();
pbt_field = $('#pbt_field').val();
taxation_calc = (parseFloat(pbt_field)  ) * (parseFloat(taxation) /100) ;
$('#taxation_calc').val(taxation_calc.toFixed(2));
document.getElementById("taxation_calc_container").innerHTML = taxation_calc.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});




var net_profit_loss;
taxation_calc  = $('#taxation_calc').val();
pbt_field = $('#pbt_field').val();
net_profit_loss = (parseFloat(pbt_field)   -  parseFloat(taxation_calc)  ) ;
$('#net_profit_loss').val(net_profit_loss.toFixed(2));
document.getElementById("net_profit_loss_container").innerHTML = net_profit_loss.toFixed(2).replace(/./g, function(c, i, a) {
    return i && c !== "." && ((a.length - i) % 3 === 0) ? ',' + c : c;
});



function CurrencyFormat(number)
{
   var decimalplaces = 2;
   var decimalcharacter = ".";
   var thousandseparater = ",";
   number = parseFloat(number);
   var sign = number < 0 ? "-" : "";
   var formatted = new String(number.toFixed(decimalplaces));
   if( decimalcharacter.length && decimalcharacter != "." ) { formatted = formatted.replace(/\./,decimalcharacter); }
   var integer = "";
   var fraction = "";
   var strnumber = new String(formatted);
   var dotpos = decimalcharacter.length ? strnumber.indexOf(decimalcharacter) : -1;
   if( dotpos > -1 )
   {
      if( dotpos ) { integer = strnumber.substr(0,dotpos); }
      fraction = strnumber.substr(dotpos+1);
   }
   else { integer = strnumber; }
   if( integer ) { integer = String(Math.abs(integer)); }
   while( fraction.length < decimalplaces ) { fraction += "0"; }
   temparray = new Array();
   while( integer.length > 3 )
   {
      temparray.unshift(integer.substr(-3));
      integer = integer.substr(0,integer.length-3);
   }
   temparray.unshift(integer);
   integer = temparray.join(thousandseparater);
   return sign + integer + decimalcharacter + fraction;
}

