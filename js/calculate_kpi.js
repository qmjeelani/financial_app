//$(document).ready(function() {
$('#kpi_form #total_rooms, #no_of_days').change(function() {
    var rooms, days, rooms_available;
    rooms = $(' #kpi_form #total_rooms ').val();
    days = $(' #kpi_form #no_of_days ').val();
    rooms_available = parseFloat(rooms) * parseFloat(days);
    $(' #kpi_form #rooms_vailable ').val(rooms_available);
});

var rooms_vailable, sales, expense_calc;
rooms_vailable = $(' #rooms_vailable ').val();
rooms_occupancy_precent = $(' #rooms_occupancy_precent ').val();
rooms_occupied = (parseFloat(rooms_vailable) * parseFloat(rooms_occupancy_precent)) / 100;
//expense_calc = CurrencyFormat(expense_calc);
$(' #rooms_occupied ').val(rooms_occupied.toFixed(2));

$('#kpi_form #rooms_vailable, #rooms_occupancy_precent').change(function() {
    var rooms_available, rooms_occupancy_precent, rooms_occupied;
    rooms_available = $(' #kpi_form #rooms_vailable ').val();
    rooms_occupancy_precent = $(' #kpi_form #rooms_occupancy_precent ').val();
    rooms_occupied = (parseFloat(rooms_available) * parseFloat(rooms_occupancy_precent) ) / 100;
    $(' #kpi_form #rooms_occupied ').val(parseFloat(rooms_occupied).toFixed(2));
});

$('#kpi_form #average_spend_food, #average_spend_beverages').change(function() {
    var average_spend_food, average_spend_beverages, total_average_spend;
    average_spend_food = $(' #kpi_form #average_spend_food ').val();
    average_spend_beverages = $(' #kpi_form #average_spend_beverages ').val();
    total_average_spend = parseFloat(average_spend_food) + parseFloat(average_spend_beverages);
    $(' #kpi_form #total_average_spend ').val(parseFloat(total_average_spend).toFixed(2));
});