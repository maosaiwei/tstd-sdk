document.addEventListener('DOMContentLoaded', function() {
    const passwordLoginForm = document.getElementById('passwordLoginForm');
    const captchaLoginForm = document.getElementById('captchaLoginForm');
    const switchToCaptchaLoginBtn = document.getElementById('switchToCaptchaLoginBtn');
    const switchToPasswordLoginBtn = document.getElementById('switchToPasswordLoginBtn');
    const loginBtn = document.getElementById('loginBtn');
    const captchaLoginBtn = document.getElementById('captchaLoginBtn');
    const wxLoginBtn = document.getElementById('wxLoginBtn');
    const qqLoginBtn = document.getElementById('qqLoginBtn');
    const appleLoginBtn = document.getElementById('appleLoginBtn');
    const refreshBtn = document.getElementById('refreshBtn');
    const captchaImg = document.getElementById('captchaImg');

    refreshBtn.addEventListener('click', function() {
        captchaImg.src = 'src/captcha.php?' + new Date().getTime(); // 添加时间戳避免缓存
    });
    function showPasswordLogin() {
        passwordLoginForm.style.display = 'block';
        captchaLoginForm.style.display = 'none';
        switchToCaptchaLoginBtn.style.display = 'block';
        switchToPasswordLoginBtn.style.display = 'none';
    }

    function showCaptchaLogin() {
        passwordLoginForm.style.display = 'none';
        captchaLoginForm.style.display = 'block';
        switchToCaptchaLoginBtn.style.display = 'none';
        switchToPasswordLoginBtn.style.display = 'block';
    }

    switchToCaptchaLoginBtn.addEventListener('click', showCaptchaLogin);
    switchToPasswordLoginBtn.addEventListener('click', showPasswordLogin);

    loginBtn.addEventListener('click', function() {
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        console.log('账密登录', username, password);
        mySdk.loginWithUsernameAndPassword(username, password);
    });

    captchaLoginBtn.addEventListener('click', function() {
        const phone = document.getElementById('phone').value;
        const captchaCode = document.getElementById('captchaCode').value;
        console.log('验证码登录', phone, captchaCode);
        mySdk.loginWithCaptcha(phone, captchaCode);
    });

    wxLoginBtn.addEventListener('click', function() {
        console.log('微信登录');
        mySdk.loginWithWeChat();
    });

    qqLoginBtn.addEventListener('click', function() {
        console.log('QQ登录');
        mySdk.loginWithQQ();
    });

    appleLoginBtn.addEventListener('click', function() {
        console.log('Apple登录');
        mySdk.loginWithApple();
    });

    refreshBtn.addEventListener('click', function() {
        console.log('刷新验证码');
        // 这里添加刷新验证码的逻辑
    });

    // 初始化页面，默认显示账密登录表单
    showPasswordLogin();
});
