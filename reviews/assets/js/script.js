jQuery(".addMore").on('click', function(event){
    jQuery(".type-form-field-row").append("<input type='text' name='misha-text' id='misha-text' style='width:60%'/><button class='addMore' style='width:5%'>+</button><p>Field description may go here.</p>");
});