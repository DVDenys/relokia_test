document.addEventListener("DOMContentLoaded", function () {
  let currentStep = 1;
  let name = document.getElementById("name"),
    email = document.getElementById("email"),
    phone = document.getElementById("phone"),
    quantity = document.getElementById("quantity");

  const steps = {
    1: document.getElementById("step-1"),
    2: document.getElementById("step-2"),
    3: document.getElementById("step-3"),
    4: document.getElementById("step-4"),
  };
  const breadCrumbs = {
    1: document.querySelector("li[data-step='1']"),
    2: document.querySelector("li[data-step='2']"),
    3: document.querySelector("li[data-step='3']"),
    4: document.querySelector("li[data-step='4']"),
  };

  const showStep = (step) => {
    Object.values(steps).forEach((el) => el.classList.add("d-none"));
    Object.values(breadCrumbs).forEach((el) => el.classList.remove("active"));
    steps[step].classList.remove("d-none");
    breadCrumbs[step].classList.add("active");
  };

  document.getElementById("to-step-2").addEventListener("click", () => {
    const email = document.getElementById("email").value.trim();
    if (!email) {
      alert("Please fill in all required fields.");
      return;
    }
    currentStep = 2;
    showStep(currentStep);
  });

  document.getElementById("back-to-step-1").addEventListener("click", () => {
    currentStep = 1;
    showStep(currentStep);
  });

  document.getElementById("to-step-3").addEventListener("click", () => {
    const quantity = document.getElementById("quantity").value.trim();
    if (!quantity || quantity > 1000) {
      alert("Please enter a valid quantity 1-1000.");
      return;
    }
    document.getElementById("price-info").textContent = `$${
      quantity <= 10 ? 10 : quantity <= 100 ? 100 : 1000
    }`;
    currentStep = 3;
    showStep(currentStep);
  });

  document.getElementById("back-to-step-2").addEventListener("click", () => {
    currentStep = 2;
    showStep(currentStep);
  });

  document.getElementById("send-data").addEventListener("click", () => {
    const data = {
      name: name.value,
      email: email.value,
      phone: phone.value,
      quantity: quantity.value,
    };

    fetch("/wp-admin/admin-ajax.php?action=send_email", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data),
    })
      .then((res) => res.json())
      .then((response) => {
        document.getElementById("response-message").innerHTML = response.success
          ? `✅ Your email was sent successfully`
          : "⚠️ We cannot send you email right now. Use alternative way to contact us";
        currentStep = 4;
        showStep(currentStep);
      })
      .catch(() => {
        document.getElementById("response-message").textContent =
          "Error occurred.";
        currentStep = 4;
        showStep(currentStep);
      });
  });

  document.getElementById("start-again").addEventListener("click", () => {
    currentStep = 1;
    showStep(currentStep);

    name.value = "";
    email.value = "";
    phone.value = "";
    quantity.value = "";
  });
});
