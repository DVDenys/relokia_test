<?php
    function child_theme_enqueue_scripts()
    {

        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css');

        wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

        wp_enqueue_style('child-theme-style', get_stylesheet_uri());

        wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', ['jquery'], null, true);

        wp_enqueue_script('wizard-js', get_stylesheet_directory_uri() . '/wizard.js', ['jquery'], null, true);
    }
    add_action('wp_enqueue_scripts', 'child_theme_enqueue_scripts');
    function r_test_shortcode($atts, $content = null)
    {
        $atts = shortcode_atts([
            'title' => 'Default Title',
        ], $atts);

        ob_start();
    ?>
<section class="wizard-section">
  <div class="wizard-container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-custom overflow-hidden text-center bg-body-tertiary border rounded-3">
        <li class="breadcrumb-item">
          <a class="text-decoration-none" href="#">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M8.70692 0.293C8.51939 0.105529 8.26508 0.000213623 7.99992 0.000213623C7.73475 0.000213623 7.48045 0.105529 7.29292 0.293L0.292919 7.293C0.110761 7.4816 0.00996641 7.7342 0.0122448 7.9964C0.0145233 8.2586 0.119692 8.50941 0.3051 8.69482C0.490508 8.88023 0.741321 8.9854 1.00352 8.98767C1.26571 8.98995 1.51832 8.88916 1.70692 8.707L1.99992 8.414V15C1.99992 15.2652 2.10528 15.5196 2.29281 15.7071C2.48035 15.8946 2.7347 16 2.99992 16H4.99992C5.26514 16 5.51949 15.8946 5.70703 15.7071C5.89456 15.5196 5.99992 15.2652 5.99992 15V13C5.99992 12.7348 6.10528 12.4804 6.29281 12.2929C6.48035 12.1054 6.7347 12 6.99992 12H8.99992C9.26514 12 9.51949 12.1054 9.70703 12.2929C9.89456 12.4804 9.99992 12.7348 9.99992 13V15C9.99992 15.2652 10.1053 15.5196 10.2928 15.7071C10.4803 15.8946 10.7347 16 10.9999 16H12.9999C13.2651 16 13.5195 15.8946 13.707 15.7071C13.8946 15.5196 13.9999 15.2652 13.9999 15V8.414L14.2929 8.707C14.4815 8.88916 14.7341 8.98995 14.9963 8.98767C15.2585 8.9854 15.5093 8.88023 15.6947 8.69482C15.8801 8.50941 15.9853 8.2586 15.9876 7.9964C15.9899 7.7342 15.8891 7.4816 15.7069 7.293L8.70692 0.293Z"
                fill="#9CA3AF" />
            </svg>
          </a>
        </li>
        <li class="breadcrumb-item active" data-step='1'>
          <a class="text-decoration-none" href="#">Contact Info</a>
        </li>
        <li class="breadcrumb-item" data-step='2'>
          <a class="text-decoration-none" href="#">Quantity</a>
        </li>
        <li class="breadcrumb-item" data-step='3'>
          <a class="text-decoration-none" href="#">Price</a>
        </li>
        <li class="breadcrumb-item" data-step='4'>
          <a class="text-decoration-none" href="#">Done</a>
        </li>
      </ol>
    </nav>
    <div id="wizard" class="wizard">
      <div id="step-1" class="wizard-step">
        <h3 class="step-title">Contact Info</h3>
        <div class="wizard__input-box">
          <label for="name" class="form-label">Name</label>
          <input type="text" id="name" class="form-control">
        </div>
        <div class="wizard__input-box my-20">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" class="form-control"
            pattern="^([a-z0-9\-_]+\.)*[a-z0-9\-_]+@[a-z0-9\-_]+(\.[a-z0-9\-_]+)*\.[a-z]{2,}$" required>
        </div>
        <div class="wizard__input-box">
          <label for="phone" class="form-label">Phone</label>
          <input type="tel" id="phone" class="form-control">
        </div>
        <div class="wizard__button-box">
          <button class="btn btn-primary" id="to-step-2">Continue</button>
        </div>
      </div>
      <div id="step-2" class="wizard-step d-none">
        <h3 class="step-title">Quantity</h3>
        <div class="wizard__input-box">
          <label for="quantity" class="form-label">Quantity</label>
          <input type="number" id="quantity" class="form-control" max="1000" required>
        </div>
        <div class="wizard__button-box">
          <button class="btn btn-primary" id="to-step-3">Continue</button>
          <button class="btn btn-secondary" id="back-to-step-1">
            <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M5.79488 10.1971L0.825062 5.22727L5.79488 0.257457L6.75368 1.20561L3.42449 4.5348H11.7874V5.91974H3.42449L6.75368 9.24361L5.79488 10.1971Z"
                fill="#4F46E5" />
            </svg>
            Back
          </button>
        </div>
      </div>
      <div id="step-3" class="wizard-step d-none">
        <h3 class="step-title">Price</h3>
        <p id="price-info" class="price-info"></p>
        <div class="wizard__button-box">
          <button class="btn btn-primary" id="send-data">Send to Email</button>
          <button class="btn btn-secondary" id="back-to-step-2">
            <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M5.79488 10.1971L0.825062 5.22727L5.79488 0.257457L6.75368 1.20561L3.42449 4.5348H11.7874V5.91974H3.42449L6.75368 9.24361L5.79488 10.1971Z"
                fill="#4F46E5" />
            </svg>
            Back
          </button>
        </div>
      </div>
      <div id="step-4" class="wizard-step d-none">
        <h3 class="step-title">Done</h3>
        <p id="response-message" class="response-message"></p>
        <div class="wizard__button-box">
          <button class="btn btn-primary" id="start-again">
            Start Again
            <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M6.21178 10.1971L5.25297 9.24893L8.58216 5.91974H0.219238V4.5348H8.58216L5.25297 1.21094L6.21178 0.257457L11.1816 5.22727L6.21178 10.1971Z"
                fill="white" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="container description">
    <h2>
      <?php echo esc_html($atts['title']); ?>
    </h2>
    <p>
      <?php echo esc_html($content); ?>
    </p>
  </div>
</section>
<?php
    return ob_get_clean();
    }
    add_shortcode('r_test', 'r_test_shortcode');
    function send_email_callback()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        $to      = $data['email'];
        $subject = "Wizard Data";
        $message = "Name: " . $data['name'] . "\nEmail: " . $data['email'] . "\nPhone: " . $data['phone'] . "\nQuantity: " . $data['quantity'];

        $success = wp_mail($to, $subject, $message);

        wp_send_json(['success' => $success]);
    }
    add_action('wp_ajax_send_email', 'send_email_callback');
add_action('wp_ajax_nopriv_send_email', 'send_email_callback');