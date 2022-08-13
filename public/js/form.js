// function add_new_field(){
//     let cars_amount = Number(document.getElementById("cars_amount").value);

//     let mark = document.getElementById("mark_" + cars_amount);
//     let model = document.getElementById("model_" + cars_amount);
//     let color = document.getElementById("color_" + cars_amount);
//     let car_number = document.getElementById("car_number_" + cars_amount);

//     if((mark != null && model != null) && (color != null && car_number != null)) {
//         document.getElementById("cars_amount").value = cars_amount++;
//         let inputs_field = document.querySelectorAll('.car_input_1');
        
//         let new_names_and_ids = ['mark_', 'model_', 'color_', 'car_number_', 'park_state_1_', 'park_state_2_'];
//         let count = 0;
//         inputs_field.forEach(item => {
//             console.log(item);
//             let new_field = item;
//             let input = new_field.querySelector("input");
//             input.id = new_names_and_ids[count] + cars_amount;
//             input.value = "";
//             input.name = new_names_and_ids[count] + cars_amount;
//             document.getElementById("add_form").append(item);
            
//             count++;
//         });
        
        
//     }
    
// }