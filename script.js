// Debug CSS loading
document.addEventListener('DOMContentLoaded', function() {
  const debugElement = document.getElementById('css-debug');
  
  // Check if external CSS loaded
  const styleSheets = Array.from(document.styleSheets);
  const externalCSSLoaded = styleSheets.some(sheet => {
    try {
      return sheet.href && sheet.href.includes('style.css');
    } catch (e) {
      return false;
    }
  });

  if (externalCSSLoaded) {
    debugElement.textContent = 'External CSS loaded successfully!';
    debugElement.style.color = 'green';
  }
});

function validateForm() {
  const password = document.getElementById("password").value;
  const confirm = document.getElementById("confirm_password").value;

  if (password !== confirm) {
    alert("Passwords do not match!");
    return false;
  }

  // Validate ticket booking selections
  const show = document.getElementById("show_name").value;
  const ticket = document.getElementById("ticket_type").value;
  if (!show) {
    alert("Please select a show.");
    return false;
  }
  if (!ticket) {
    alert("Please select a ticket type.");
    return false;
  }

  return true;
}

// Initialize select placeholder coloring and keep colors correct on change.
document.addEventListener('DOMContentLoaded', function() {
  // Elements to style when empty (placeholder-like)
  const ids = ['gender', 'show_name', 'ticket_type', 'dob'];

  ids.forEach(function(id) {
    const el = document.getElementById(id);
    if (!el) return;

    const setMuted = () => {
      // muted color when empty
      el.style.color = '#9aa3b2';
    };
    const setNormal = () => {
      // normal text color when value present
      el.style.color = '#27313a';
    };

    // Initialize
    if (!el.value) setMuted(); else setNormal();

    // Behavior differs for select vs input/date
    if (el.tagName.toLowerCase() === 'select') {
      el.addEventListener('change', function() {
        if (!this.value) setMuted(); else setNormal();
      });
    } else {
      // for inputs (e.g., date), update on input/change/blur
      el.addEventListener('input', function() {
        if (!this.value) setMuted(); else setNormal();
      });
      el.addEventListener('change', function() {
        if (!this.value) setMuted(); else setNormal();
      });
      // on focus, ensure color is normal so user sees typed value clearly
      el.addEventListener('focus', function() { setNormal(); });
      // on blur, restore muted if empty
      el.addEventListener('blur', function() { if (!this.value) setMuted(); });
    }
  });
});