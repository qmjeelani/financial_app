
var room_total_expense_cons;
var room_payroll_expense_cons = $(' #room_payroll_expense_cons ').val();
var room_other_expenses_cons = $(' #room_other_expenses_cons ').val();
room_total_expense_cons = parseFloat(room_payroll_expense_cons) + parseFloat(room_other_expenses_cons);
$(' #room_total_expense_cons ').val(room_total_expense_cons.toFixed(2));

var room_department_profit_cons;
var room_sales_cons = $(' #room_sales_cons ').val();
var room_total_expense_cons = $(' #room_total_expense_cons ').val();
room_department_profit_cons = parseFloat(room_sales_cons) - parseFloat(room_total_expense_cons);
$('  #room_department_profit_cons ').val(room_department_profit_cons.toFixed(2));
//});
//$(document).ready(function() {


var food_sales_cons, beverage_sales_cons, fnb_other_income_cons;
 food_sales_cons = $(' #food_sales_cons ').val();
 beverage_sales_cons = $(' #beverage_sales_cons ').val();
 fnb_other_income_cons = $(' #fnb_other_income_cons ').val();
total_sales_fnb_cons = parseFloat(food_sales_cons) + parseFloat(beverage_sales_cons)  + parseFloat(fnb_other_income_cons);
$(' #total_sales_fnb_cons ').val(total_sales_fnb_cons.toFixed(2));


var total_cost_sales_fnb_cons;
 food_cost_cons = $(' #food_cost_cons ').val();
 beverage_cost_cons = $(' #beverage_cost_cons ').val();
 other_income_fnb_cons = $(' #other_income_fnb_cons ').val();
total_cost_sales_fnb_cons = parseFloat(food_cost_cons) + parseFloat(beverage_cost_cons)  + parseFloat(other_income_fnb_cons);
$(' #total_cost_sales_fnb_cons ').val(total_cost_sales_fnb_cons.toFixed(2));



var total_cost_fnb_cons;
total_cost_sales_fnb_cons = $(' #total_cost_sales_fnb_cons ').val();
 payroll_expense_fnb_cons = $(' #payroll_expense_fnb_cons ').val();
 other_expenses_fnb_cons = $(' #other_expenses_fnb_cons ').val();
total_cost_fnb_cons = parseFloat(food_cost_cons) + parseFloat(payroll_expense_fnb_cons) + parseFloat(other_expenses_fnb_cons);
$(' #total_cost_fnb_cons ').val(total_cost_fnb_cons.toFixed(2));


var dep_profit_fnb_cons;
total_sales_fnb_cons = $(' #total_sales_fnb_cons ').val();
 total_cost_fnb_cons = $(' #total_cost_fnb_cons ').val();
dep_profit_fnb_cons = parseFloat(total_sales_fnb_cons) - parseFloat(total_cost_fnb_cons) ;
$(' #dep_profit_fnb_cons ').val(dep_profit_fnb_cons.toFixed(2));


var min_op_dep_profit_cons;
min_op_sales_cons = $(' #min_op_sales_cons ').val();
 min_op_cost_sales_cons = $(' #min_op_cost_sales_cons ').val();
min_op_dep_profit_cons = parseFloat(min_op_sales_cons) - parseFloat(min_op_cost_sales_cons) ;
$(' #min_op_dep_profit_cons ').val(min_op_dep_profit_cons.toFixed(2));

var min_op_sports_sales_dep_profit_cons;
min_op_sports_expenses_cons = $(' #min_op_sports_expenses_cons ').val();
 min_op_sports_sales_cons = $(' #min_op_sports_sales_cons ').val();
min_op_sports_sales_dep_profit_cons = parseFloat(min_op_sports_sales_cons) - parseFloat(min_op_sports_expenses_cons) ;
$(' #min_op_sports_sales_dep_profit_cons ').val(min_op_sports_sales_dep_profit_cons.toFixed(2));


var total_sales_all_dep_cons ,food_sales_cons, min_op_sales_cons, min_op_sports_sales_cons, rental_other_income_cons;
room_sales_cons = $(' #room_sales_cons ').val();
food_sales_cons = $(' #food_sales_cons ').val();
min_op_sales_cons = $(' #min_op_sales_cons ').val();
min_op_sports_sales_cons = $(' #min_op_sports_sales_cons ').val();
rental_other_income_cons = $(' #rental_other_income_cons ').val();
head_office_income_cons = $(' #head_office_income_cons ').val();
total_sales_all_dep_cons = (parseFloat(room_sales_cons) + parseFloat(food_sales_cons) +  parseFloat(min_op_sales_cons) + parseFloat(min_op_sports_sales_cons) + parseFloat(rental_other_income_cons) +  parseFloat(head_office_income_cons))  ;
$('#total_sales_all_dep_cons').val(total_sales_all_dep_cons.toFixed(2));



var head_office_charges_cons;
var management_fee_cons = $(' #management_fee_cons ').val();
var marketing_ho_cons = $(' #marketing_ho_cons ').val();
var admin_finance_ho_cons = $(' #admin_finance_ho_cons ').val();
head_office_charges_cons = (parseFloat(management_fee_cons)   + parseFloat(marketing_ho_cons) + parseFloat(admin_finance_ho_cons) ) ;
$('#head_office_charges_cons').val(head_office_charges_cons.toFixed(2));




room_department_profit_cons = $(' #room_department_profit_cons ').val();
dep_profit_fnb_cons = $(' #dep_profit_fnb_cons ').val();
min_op_dep_profit_cons = $(' #min_op_dep_profit_cons ').val();
min_op_sports_sales_dep_profit_cons = $(' #min_op_sports_sales_dep_profit_cons ').val();
rental_other_income_cons = $(' #rental_other_income_cons ').val();
head_office_income_cons = $(' #head_office_income_cons ').val();
total_gross_income_cons = (parseFloat(room_department_profit_cons) + parseFloat(dep_profit_fnb_cons) +  parseFloat(min_op_dep_profit_cons) + parseFloat(min_op_sports_sales_dep_profit_cons) + parseFloat(rental_other_income_cons) +  parseFloat(head_office_income_cons))  ;
$('#total_gross_income_cons').val(total_gross_income_cons.toFixed(2));


var total_gross_income_cons , income_bef_fix_charges_cons;
total_gross_income_cons = $(' #total_gross_income_cons ').val();
hotel_admin_general_cons = $(' #hotel_admin_general_cons ').val();
local_sales_marketing_cons = $(' #local_sales_marketing_cons ').val();
energy_costs_cons = $(' #energy_costs_cons ').val();
repair_maintence_cons= $(' #repair_maintence_cons ').val();
real_estate_taxes_cons = $(' #real_estate_taxes_cons ').val();
income_bef_fix_charges_cons = (parseFloat(total_gross_income_cons) - parseFloat(hotel_admin_general_cons) -  parseFloat(local_sales_marketing_cons) - parseFloat(energy_costs_cons) - parseFloat(repair_maintence_cons) -  parseFloat(real_estate_taxes_cons))  ;
$('#income_bef_fix_charges_cons').val(income_bef_fix_charges_cons.toFixed(2));


var ebidat_field_cons;
income_bef_fix_charges_cons  = $('#income_bef_fix_charges_cons').val();
head_office_charges_cons  = $('#head_office_charges_cons').val();
ebidat_field_cons = (parseFloat(income_bef_fix_charges_cons)   -  parseFloat(head_office_charges_cons)  ) ;
$('#ebidat_field_cons').val(ebidat_field_cons.toFixed(2));



var pbt_field_cons;
depreciation_field_cons  = $('#depreciation_field_cons').val();
amortization_field_cons  = $('#amortization_field_cons').val();
ebidat_field_cons  = $('#ebidat_field_cons').val();
pbt_field_cons = (parseFloat(ebidat_field_cons)   -  parseFloat(depreciation_field_cons) -  parseFloat(amortization_field_cons)  ) ;
$('#pbt_field_cons').val(pbt_field_cons.toFixed(2));

var net_profit_loss_cons;
taxation_cons  = $('#taxation_cons').val();
pbt_field_cons = $('#pbt_field_cons').val();
net_profit_loss_cons = (parseFloat(pbt_field_cons)   -  parseFloat(taxation_cons)  ) ;
$('#net_profit_loss_cons').val(net_profit_loss_cons.toFixed(2));







//});
//////// Food and Beverage Department