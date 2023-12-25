/**
 * Variables
 */
const check_login = () => {
  const username = localStorage.getItem("username") ?? null;
  const role = localStorage.getItem("role") ?? null;
  const url = localStorage.getItem("url") ?? null;
  if (username == null) return;
  if (role != null && role == "admin") {
    window.location.href = `${url}views/pages/admin/home.php`;
  } else {
    window.location.href = `${url}index.php`;
  }
};
check_login();
const signupButton = document.getElementById("signup-button"),
  loginButton = document.getElementById("login-button"),
  userForms = document.getElementById("user_options-forms");
signupButton.addEventListener(
  "click",
  () => {
    userForms.classList.remove("bounceRight");
    userForms.classList.add("bounceLeft");
  },
  false
);
loginButton.addEventListener(
  "click",
  () => {
    userForms.classList.remove("bounceLeft");
    userForms.classList.add("bounceRight");
  },
  false
);
$(() => {
  $("#sign_in_btn").click((e) => {
    e.preventDefault();
    const username = $("#username_login").val();
    const password = $("#password_login").val();
    if (!(username && password && username.length > 0 && password.length > 0)) {
      $.toast({
        text: "Vui lòng nhập đầy đủ tên tài khoản và mật khẩu",
        icon: "error",
      });
      return;
    }
    const payload = {
      username: username,
      password: password,
      method: "sign_in",
    };
    $.post("../../routes/auth.route.php", payload, (data) => {
      const data_obj = JSON.parse(data);
      if (data_obj.success === false) {
        $.toast({
          text: data_obj.message,
          icon: "error",
        });
        return;
      }
      $.toast({
        text: data_obj.message,
        icon: "success",
      });
      localStorage.setItem("username", data_obj.data.username);
      localStorage.setItem("role", data_obj.data.role);
      localStorage.setItem("url", data_obj.data.url);
      if (data_obj.data.role === "admin") {
        window.location.href = `${data_obj.data.url}views/pages/admin/home.php`;
        return;
      }
      window.location.href = `${data_obj.data.url}index.php`;
    });
  });
  $("#sign_up_btn").click((e) => {
    e.preventDefault();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const username = $("#username_register").val() ?? "";
    const password = $("#password_register").val();
    const email = $("#email_register").val();
    const isValidEmail = emailRegex.test(email);
    if (
      !(
        username &&
        password &&
        email &&
        username.length > 0 &&
        password.length > 0 &&
        email.length > 0
      )
    ) {
      $.toast({
        text: "Vui lòng nhập đầy đủ thông tin",
        icon: "error",
      });
      return;
    }
    if (!isValidEmail) {
      $.toast({
        text: "Email không hợp lệ",
        icon: "error",
      });
      return;
    }
    const payload = {
      username: username,
      password: password,
      email: email,
      method: "sign_up",
    };
    $.post("../../routes/auth.route.php", payload, (data) => {
      const data_obj = JSON.parse(data);
      if (data_obj.success === false) {
        $.toast({
          text: data_obj.message,
          icon: "error",
        });
        return;
      }
      $.toast({
        text: data_obj.message,
        icon: "success",
      });
      location.reload();
    });
  });
});
