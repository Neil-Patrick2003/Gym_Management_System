// auto-submit.js

// Function to auto-submit the form when the select option changes
function autoSubmitForm(selectId, formId) {
    // Add event listener to the dropdown (select element)
    document.getElementById(selectId).addEventListener('change', function () {
        // Get the form element
        var form = document.getElementById(formId);
        // Submit the form automatically
        form.submit();
    });
}

// Call the function with the specific select and form IDs
autoSubmitForm('categories', 'filterForm');


