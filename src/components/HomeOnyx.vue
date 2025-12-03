<script setup>
import { teamMembers } from "../data/teamMembers";
import { onMounted } from "vue";
import * as bootstrap from "bootstrap";
onMounted(() => {
  const navLinks = document.querySelectorAll("#mainNav .nav-link");
  const bsCollapse = new bootstrap.Collapse("#mainNav", { toggle: false });
  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      bsCollapse.hide();
    });
  });
});

onMounted(() => {
  const form = document.getElementById("telegramForm");
  if (!form) return;

  const btn = form.querySelector("button[type='submit']");
  const btnText = form.querySelector(".btn-text");
  const btnLoading = form.querySelector(".btn-loading");

  const API_URL = "https://example.com/api/contact.php";

  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData(form);
    const name = formData.get("name");
    const email = formData.get("email");
    const message = formData.get("message");

    if (btn) btn.disabled = true;
    if (btnText) btnText.classList.add("d-none");
    if (btnLoading) btnLoading.classList.remove("d-none");

    try {
      const res = await fetch(API_URL, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ name, email, message }),
      });

      const data = await res.json();

      if (!res.ok || !data.ok) {
        alert("ارسال پیام با خطا مواجه شد. لطفاً دوباره امتحان کنید.");
      } else {
        alert("پیام شما با موفقیت ارسال شد ✅");
        form.reset();
      }
    } catch (err) {
      console.error(err);
      alert("خطا در ارتباط با سرور. بعداً دوباره امتحان کنید.");
    } finally {
      if (btn) btn.disabled = false;
      if (btnText) btnText.classList.remove("d-none");
      if (btnLoading) btnLoading.classList.add("d-none");
    }
  });
});
</script>

<template>
  <div id="top">
    <header class="ai-header shadow-sm" role="banner">
      <nav class="navbar navbar-expand-lg navbar-dark container">
        <a class="navbar-brand d-flex align-items-center" href="#top">
          <img src="/images/background.png" class="brand-logo" alt="لوگوی تیم انیکس" />
          <span class="ms-2">تیم انیکس</span>
        </a>

        <button
          class="navbar-toggler ai-toggle"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#mainNav"
          aria-controls="mainNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 main-nav">
            <li class="nav-item">
              <a class="nav-link" href="#about">درباره ما</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">خدمات</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#projects">پروژه‌ها</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#team">اعضای تیم</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">تماس با ما</a>
            </li>
          </ul>

          <div class="navbar-social d-none d-lg-flex ms-3">
            <a href="https://t.me/OnxAiTeam" target="_blank" aria-label="تلگرام تیم انیکس">
              <i class="fa-brands fa-telegram"></i>
            </a>
            <a
              href="https://www.instagram.com/onxaiteam"
              target="_blank"
              aria-label="اینستاگرام تیم انیکس"
            >
              <i class="fa-brands fa-instagram"></i>
            </a>
          </div>

          <div class="navbar-social-mobile d-lg-none mt-3 pt-3 border-top border-secondary">
            <span class="small d-block mb-2" style="color: #fff">شبکه‌های اجتماعی</span>

            <a href="https://t.me/OnxAiTeam" target="_blank" aria-label="تلگرام تیم انیکس">
              <i class="fa-brands fa-telegram"></i>
            </a>

            <a
              href="https://www.instagram.com/onxaiteam"
              target="_blank"
              aria-label="اینستاگرام تیم انیکس"
            >
              <i class="fa-brands fa-instagram"></i>
            </a>
          </div>
        </div>
      </nav>
    </header>

    <main id="top">
      <section class="hero" id="hero" aria-labelledby="hero-title">
        <div class="container">
          <div class="row align-items-center hero-inner">
            <div class="col-lg-7">
              <h1 id="hero-title" class="hero-title">تیم انیکس؛ شریک شما در دنیای دیجیتال</h1>
              <p>
                از طراحی سایت و اپلیکیشن تا ربات تلگرام،<br />
                ما کمک می‌کنیم برندت حرفه‌ای، متمایز و به‌یادماندنی دیده شود.
              </p>
              <div class="d-flex flex-wrap gap-2 hero-actions mb-4">
                <a href="#projects" class="btn btn-primary-custom"> مشاهده پروژه‌ها </a>
                <a href="#contact" class="btn btn-outline-custom"> درخواست همکاری </a>
              </div>
              <div class="d-flex flex-wrap hero-stats gap-4" aria-label="آمار فعالیت تیم">
                <div class="stat">
                  <span>+۵۰</span>
                  <small>پروژه موفق</small>
                </div>
                <div class="stat">
                  <span>+۲۰</span>
                  <small>مشتری راضی</small>
                </div>
                <div class="stat">
                  <span>۳+</span>
                  <small>سال تجربه</small>
                </div>
              </div>
            </div>
            <div class="col-lg-5 d-none d-lg-block"></div>
          </div>
        </div>
      </section>
      <section id="about" class="section fancy-section" aria-labelledby="about-title">
        <div class="container">
          <div class="text-center mb-4 section-header">
            <h2 class="section-title" id="about-title">درباره ما</h2>
            <p class="section-subtitle">
              تیمی خلاق، متعهد و عاشق تکنولوژی که روی کیفیت و جزئیات وسواس دارد.
            </p>
          </div>
          <div class="row g-4 about-grid">
            <div class="col-md-4">
              <article class="about-card text-center h-100">
                <i class="fa-solid fa-rocket fa-2x mb-3" aria-hidden="true"></i>
                <h3 class="mb-2">ماموریت ما</h3>
                <p class="mb-0">
                  کمک به رشد کسب‌وکارها با راهکارهای دیجیتال سریع، مدرن و قابل اعتماد.
                </p>
              </article>
            </div>
            <div class="col-md-4">
              <article class="about-card text-center h-100">
                <i class="fa-solid fa-eye fa-2x mb-3" aria-hidden="true"></i>
                <h3 class="mb-2">چشم‌انداز</h3>
                <p class="mb-0">تبدیل شدن به یکی از استودیوهای مرجع طراحی و توسعه در ایران.</p>
              </article>
            </div>
            <div class="col-md-4">
              <article class="about-card text-center h-100">
                <i class="fa-solid fa-heart fa-2x mb-3" aria-hidden="true"></i>
                <h3 class="mb-2">ارزش‌ها</h3>
                <p class="mb-0">صداقت، کیفیت، نوآوری و همراهی بلندمدت با مشتری.</p>
              </article>
            </div>
          </div>
        </div>
      </section>
      <section id="services" class="section" aria-labelledby="services-title">
        <div class="container">
          <div class="text-center mb-4 section-header">
            <h2 class="section-title" id="services-title">خدمات ما</h2>
            <p class="section-subtitle">
              هر چیزی که برای حضور حرفه‌ای در دنیای دیجیتال نیاز دارید، یک‌جا.
            </p>
          </div>
          <div class="row g-4 service-grid">
            <div class="col-md-4">
              <article class="service-box text-center h-100">
                <div class="service-icon mb-3">
                  <i class="fa-solid fa-code fa-2x" aria-hidden="true"></i>
                </div>
                <h3 class="mb-2">طراحی و توسعه وب</h3>
                <p class="mb-0">سایت‌های سریع، ریسپانسیو، سئو شده و هماهنگ با هویت برند شما.</p>
              </article>
            </div>
            <div class="col-md-4">
              <article class="service-box text-center h-100">
                <div class="service-icon mb-3">
                  <i class="fa-solid fa-mobile-screen fa-2x" aria-hidden="true"></i>
                </div>
                <h3 class="mb-2">اپلیکیشن موبایل</h3>
                <p class="mb-0">اپ‌های اندروید و iOS با تجربه کاربری روان و حرفه‌ای.</p>
              </article>
            </div>
            <div class="col-md-4">
              <article class="service-box text-center h-100">
                <div class="service-icon mb-3">
                  <i class="fa-brands fa-telegram fa-2x" aria-hidden="true"></i>
                </div>
                <h3 class="mb-2">ربات تلگرام</h3>
                <p class="mb-0">توسعه ربات تلگرام مطابق با نیاز کسب‌وکار شما.</p>
              </article>
            </div>
          </div>
        </div>
      </section>
      <section id="projects" class="section fancy-section" aria-labelledby="projects-title">
        <div class="container">
          <div class="text-center mb-4 section-header">
            <h2 class="section-title" id="projects-title">نمونه پروژه‌ها</h2>
            <p class="section-subtitle">
              بخشی از کارهایی که با افتخار برای مشتریان‌مان انجام داده‌ایم.
            </p>
          </div>
          <div class="row g-4 projects-grid">
            <div class="col-md-4">
              <article class="project-card h-100">
                <div class="project-tag">وب‌سایت شرکتی</div>
                <h3 class="mb-2">وب‌سایت رسمی یک مجموعه خدماتی</h3>
                <p class="mb-0">طراحی UI/UX اختصاصی، پیاده‌سازی ریسپانسیو و سئو اولیه.</p>
              </article>
            </div>
            <div class="col-md-4">
              <article class="project-card h-100">
                <div class="project-tag">ربات فروشگاهی</div>
                <h3 class="mb-2">ربات فروش آنلاین محصولات دیجیتال</h3>
                <p class="mb-0">ربات تلگرام، پنل مدیریت اختصاصی و سیستم پرداخت و فاکتور.</p>
              </article>
            </div>
            <div class="col-md-4">
              <article class="project-card h-100">
                <div class="project-tag">ربات سینما</div>
                <h3 class="mb-2">تماشا آنلاین فیلم و سریال</h3>
                <p class="mb-0">ترکیب هوش مصنوعی با دنیای سینما برای تجربه‌ای متفاوت.</p>
              </article>
            </div>
          </div>
        </div>
      </section>
      <section id="team" class="section" aria-labelledby="team-title">
        <div class="container">
          <div class="text-center mb-4 section-header">
            <h2 class="section-title" id="team-title">اعضای تیم</h2>
            <p class="section-subtitle">پشت هر پروژه موفق، یک تیم منسجم و حرفه‌ای قرار دارد.</p>
          </div>
          <div class="row gx-3 gy-3 team-grid">
            <div
              v-for="(member, index) in teamMembers"
              :key="member.slug"
              :class="[
                'col-6 col-md-6',
                index === teamMembers.length - 1 ? 'offset-md-3 col-md-6 col-12' : '',
              ]"
            >
              <RouterLink
                class="team-card h-100 text-center d-block"
                :to="{ name: 'TeamMember', params: { slug: member.slug } }"
              >
                <div class="avatar-wrapper">
                  <img :src="member.avatar" :alt="member.name" />
                </div>

                <h3>{{ member.name }}</h3>
                <p class="role">{{ member.role }}</p>
              </RouterLink>
            </div>
          </div>
        </div>
      </section>
      <section id="contact" class="section fancy-section" aria-labelledby="contact-title">
        <div class="container">
          <div class="text-center mb-4 section-header">
            <h2 class="section-title" id="contact-title">ارتباط با ما</h2>
            <p class="section-subtitle">
              اگر برای پروژه‌ات ایده‌ای داری، خوشحال می‌شویم با هم صحبت کنیم.
            </p>
          </div>
          <div class="row g-4 contact-layout align-items-stretch">
            <div class="col-lg-6">
              <form class="contact-form h-100 d-flex flex-column" id="telegramForm">
                <input
                  type="text"
                  name="name"
                  class="form-control mb-3"
                  placeholder="نام شما"
                  required
                />
                <input
                  type="email"
                  name="email"
                  class="form-control mb-3"
                  placeholder="ایمیل"
                  required
                />
                <textarea
                  name="message"
                  class="form-control mb-3"
                  rows="4"
                  placeholder="توضیح کوتاه درباره پروژه یا سوال شما"
                  required
                ></textarea>
                <button type="submit" class="btn mt-auto">
                  <span class="btn-text">ارسال پیام</span>
                  <span class="btn-loading d-none">در حال ارسال...</span>
                </button>
              </form>
            </div>
            <div class="col-lg-6">
              <div class="contact-info h-100">
                <h3 class="mb-2">چطور می‌توانیم کمک کنیم؟</h3>
                <p class="mb-3">در مورد طراحی سایت یا ربات تلگرام هر سوالی داشتی، برای ما بنویس.</p>
                <ul class="list-unstyled mb-0">
                  <li class="mb-2">
                    <i class="fa-solid fa-envelope me-2"></i>
                    OnyxaiTeamBot@gmail.com
                  </li>
                  <li class="mb-2">
                    <i class="fa-solid fa-location-dot me-2"></i>
                    ایران، تهران
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="footer-onyx-v7 mt-5">
      <div class="footer-main py-5">
        <div class="container">
          <div class="row gy-4 align-items-start">
            <div class="col-lg-4 col-md-6">
              <h5 class="footer-logo mb-3">تیم انیکس</h5>
              <p class="footer-desc mb-3">
                استودیوی خلاق دیجیتال؛ از طراحی محصول تا ساخت هویت برند، کنار تو هستیم. روی سرعت،
                کیفیت و تجربه کاربری تمرکز می‌کنیم.
              </p>
            </div>
            <div class="col-lg-5 col-md-6">
              <div class="row">
                <div class="col-6 col-sm-4">
                  <h6 class="footer-title">لینک‌ها</h6>
                  <ul class="list-unstyled footer-links">
                    <li><a href="#about">درباره ما</a></li>
                    <li><a href="#services">خدمات</a></li>
                    <li><a href="#projects">پروژه‌ها</a></li>
                    <li><a href="#team">اعضای تیم</a></li>
                    <li><a href="#contact">تماس</a></li>
                  </ul>
                </div>
                <div class="col-6 col-sm-4">
                  <h6 class="footer-title">خدمات</h6>
                  <ul class="list-unstyled footer-links">
                    <li>طراحی وب</li>
                    <li>توسعه وب‌اپ</li>
                    <li>اپلیکیشن موبایل</li>
                    <li>ربات تلگرام</li>
                  </ul>
                </div>
                <div class="col-6 col-sm-4 mt-3 mt-sm-0">
                  <h6 class="footer-title">همکاری</h6>
                  <ul class="list-unstyled footer-links">
                    <li>همکاری پروژه‌ای</li>
                    <li>فریلنسری</li>
                    <li>پیشنهاد شراکت</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-12">
              <div class="footer-actions text-lg-start text-center mt-3 mt-lg-0">
                <a href="#contact" class="btn footer-cta mb-3"> درخواست همکاری </a>
                <div class="footer-social">
                  <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" aria-label="Telegram"><i class="bi bi-telegram"></i></a>
                  <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                  <a href="#" aria-label="Github"><i class="bi bi-github"></i></a>
                </div>
              </div>
            </div>
          </div>

          <hr class="footer-separator mt-4 mb-3" />

          <div
            class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-2 footer-bottom-row"
          >
            <div class="footer-copy small">
              © تمامی حقوق متعلق به <strong>تیم انیکس</strong> است.
            </div>
            <div class="footer-bottom-links small">
              <a href="#about">درباره</a>
              <span>•</span>
              <a href="#services">خدمات</a>
              <span>•</span>
              <a href="#contact">تماس</a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<style>
@import url("https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700;800&display=swap");

body {
  margin: 0 !important;
  padding: 0 !important;
  background: radial-gradient(circle at top, #020617, #000000 70%);
  color: #e5e7eb;
  scroll-behavior: smooth;
  font-family: "Vazirmatn", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
}

a {
  text-decoration: none;
  color: inherit;
}

header {
  margin-bottom: 0 !important;
  padding-bottom: 0 !important;
}

main {
  padding-top: 0 !important;
}

.ai-header {
  width: 100%;
  padding: 6px 0;
  background: #020617;
  border-bottom: 1px solid #111827;
  position: sticky;
  top: 0;
  z-index: 1000;
}

.ai-header .navbar {
  padding-top: 0;
  padding-bottom: 0;
}

.brand-logo {
  width: 38px;
  height: 38px;
  border-radius: 50%;
  object-fit: cover;
}

.main-nav .nav-link {
  color: #e5e7eb !important;
  font-size: 14px;
  font-weight: 500;
  margin-left: 14px;
  position: relative;
  padding-top: 14px;
  padding-bottom: 14px;
  transition: color 0.2s ease;
}

.main-nav .nav-link:hover {
  color: #60a5fa !important;
}

.main-nav .nav-link::after {
  content: "";
  position: absolute;
  bottom: 6px;
  right: 0;
  width: 0;
  height: 2px;
  background: #3b82f6;
  border-radius: 999px;
  transition: width 0.2s ease;
}

.main-nav .nav-link:hover::after {
  width: 100%;
}

.ai-toggle {
  border: none;
}

.navbar-social {
  display: flex;
  align-items: center;
  gap: 10px;
}

.navbar-social a {
  color: #9ca3af;
  font-size: 18px;
  transition: color 0.2s ease, transform 0.2s ease;
}

.navbar-social a:hover {
  color: #60a5fa;
  transform: translateY(-1px);
}

.navbar-social-mobile a {
  color: #e5e7eb;
  font-size: 18px;
  margin-left: 10px;
  transition: color 0.2s ease, transform 0.2s ease;
}

.navbar-social-mobile a:hover {
  color: #60a5fa;
  transform: translateY(-1px);
}

#mainNav {
  background: #020617;
  border-radius: 12px;
  padding: 8px 10px;
  margin-top: 6px;
}

@media (max-width: 992px) {
  .main-nav .nav-link {
    margin-left: 0;
    padding-top: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.04);
  }

  .main-nav .nav-link:last-child {
    border-bottom: none;
  }
}

.hero {
  margin-top: 0 !important;
  padding-top: 2.2rem;
  padding-bottom: 4rem;
  background: radial-gradient(circle at top left, #0f172a, #020617 55%, #000);
}

.hero-title {
  font-size: clamp(1.9rem, 3vw, 2.4rem);
  font-weight: 800;
  margin-bottom: 1rem;
  margin-top: 0;
}

.hero h1 {
  margin-top: 0;
}

.hero p {
  color: #cbd5f5;
  margin-bottom: 1.5rem;
  line-height: 1.8;
}

.btn-primary-custom {
  background: linear-gradient(135deg, #2563eb, #38bdf8);
  border: none;
  color: #f9fafb;
  padding-inline: 1.5rem;
  font-weight: 600;
}

.btn-primary-custom:hover {
  background: linear-gradient(135deg, #1d4ed8, #0ea5e9);
}

.btn-outline-custom {
  border-color: #38bdf8;
  color: #e5e7eb;
  padding-inline: 1.5rem;
  font-weight: 600;
}

.btn-outline-custom:hover {
  background: #0f172a;
  color: #e5e7eb;
}

.hero-stats .stat span {
  display: block;
  font-size: 1.3rem;
  font-weight: 700;
  color: #38bdf8;
}

.hero-stats .stat small {
  color: #9ca3af;
}

.section {
  padding-block: 4rem;
}

.section-title {
  font-weight: 800;
  margin-bottom: 0.5rem;
  color: #e5e7eb;
}

.section-subtitle {
  color: #9ca3af;
}

.fancy-section {
  background: radial-gradient(circle at top, rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.4));
}

.about-card,
.service-box,
.project-card,
.team-card,
.contact-form,
.contact-info,
.newsletter-form {
  background: rgba(15, 23, 42, 0.9);
  border-radius: 1rem;
  border: 1px solid rgba(30, 64, 175, 0.45);
  padding: 1.5rem;
  height: 100%;
}

.about-card i,
.service-icon i,
.project-tag,
.contact-info i {
  color: #38bdf8;
}

.about-card h3,
.service-box h3,
.project-card h3,
.team-card h3,
.contact-info h3 {
  font-weight: 700;
  color: #e5e7eb;
}

.project-tag {
  display: inline-block;
  font-size: 0.75rem;
  background: rgba(56, 189, 248, 0.12);
  padding: 0.2rem 0.75rem;
  border-radius: 999px;
  margin-bottom: 0.5rem;
  color: #38bdf8;
}

.team-card img {
  width: 100%;
  border-radius: 999px;
  height: 180px;
  object-fit: cover;
  border: 2px solid rgba(56, 189, 248, 0.8);
}

.team-card .role {
  color: #9ca3af;
  font-size: 0.9rem;
}

.contact-form input,
.contact-form textarea,
.newsletter-form input {
  background: rgba(15, 23, 42, 0.95);
  border-color: rgba(148, 163, 184, 0.6);
  color: #e5e7eb;
}

.contact-form input::placeholder,
.contact-form textarea::placeholder,
.newsletter-form input::placeholder {
  color: #6b7280;
}

.contact-form button,
.newsletter-form button {
  background: linear-gradient(135deg, #2563eb, #38bdf8);
  border: none;
  color: #f9fafb;
  font-weight: 600;
}

.contact-form button:hover,
.newsletter-form button:hover {
  background: linear-gradient(135deg, #1d4ed8, #0ea5e9);
}

.team-grid {
  align-items: stretch;
}

.team-card {
  background: rgba(15, 23, 42, 0.95);
  border-radius: 1rem;
  border: 1px solid rgba(30, 64, 175, 0.5);
  padding: 1rem 1.2rem 1.2rem;
  width: 100%;
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease,
    background 0.25s ease;
  box-shadow: 0 8px 22px rgba(15, 23, 42, 0.9);
  position: relative;
  overflow: hidden;
  text-align: center;
  text-decoration: none !important;
  color: inherit !important;
}

.team-card h3 {
  margin-top: 0.75rem;
  margin-bottom: 0.15rem;
  font-weight: 700;
  font-size: 1.05rem;
}

.team-card .role {
  font-size: 0.85rem;
  color: #9ca3af;
}

.avatar-wrapper {
  width: 160px;
  height: 160px;
  margin: 0 auto;
  border-radius: 999px;
  padding: 3px;
  background: radial-gradient(circle at top, #38bdf8, transparent 60%);
}

.avatar-wrapper img {
  width: 100%;
  height: 100%;
  border-radius: 999px;
  object-fit: cover;
  display: block;
  box-shadow: 0 0 14px rgba(56, 189, 248, 0.7);
  transition: transform 0.35s ease, box-shadow 0.35s ease;
}

.team-card::before {
  content: "";
  position: absolute;
  inset: 0;
  opacity: 0;
  background: radial-gradient(circle at top, rgba(56, 189, 248, 0.2), transparent 55%);
  transition: opacity 0.25s ease;
}

.team-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 14px 30px rgba(15, 23, 42, 1);
  border-color: #38bdf8;
  background: rgba(15, 23, 42, 0.98);
}

.team-card:hover::before {
  opacity: 1;
}

.team-card:hover .avatar-wrapper img {
  transform: scale(1.05);
  box-shadow: 0 0 22px rgba(56, 189, 248, 0.95);
}

@media (max-width: 576px) {
  .team-card {
    max-width: 100%;
  }
  .avatar-wrapper {
    width: 130px;
    height: 130px;
  }
}

.about-card,
.service-box,
.project-card {
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease,
    background 0.25s ease;
  cursor: default;
}

.about-card:hover,
.service-box:hover,
.project-card:hover {
  transform: translateY(-6px);
  background: rgba(15, 23, 42, 0.98);
  box-shadow: 0 16px 35px rgba(15, 23, 42, 0.95);
  border-color: #38bdf8;
}

.mega-footer {
  background: #020617;
  padding-block: 3rem;
  border-top: 1px solid #111827;
  color: #9ca3af;
}

.mega-footer .logo img {
  width: 40px;
  height: 40px;
  border-radius: 999px;
  margin-left: 0.5rem;
}

.mega-footer .logo span {
  font-weight: 700;
  color: #e5e7eb;
}

.footer-social a {
  color: #9ca3af;
  margin-inline: 0.3rem;
  transition: color 0.2s ease;
}

.footer-social a:hover {
  color: #38bdf8;
}

.footer-onyx-v7 {
  direction: rtl;
  text-align: right;
  font-size: 0.95rem;
}

.footer-onyx-v7 .footer-main {
  background: #020617;
  color: #d8d8d8;
}

.footer-onyx-v7 .footer-logo {
  color: #ffffff;
  font-weight: 600;
  font-size: 1.2rem;
}

.footer-onyx-v7 .footer-desc {
  color: #b5b5b5;
  line-height: 1.8;
}

.footer-onyx-v7 .footer-title {
  color: #ffffff;
  font-size: 0.95rem;
  font-weight: 600;
  margin-bottom: 10px;
}

.footer-onyx-v7 .footer-links li {
  margin-bottom: 6px;
}

.footer-onyx-v7 .footer-links a {
  color: #a9a9a9;
  text-decoration: none;
  transition: 0.25s;
}

.footer-onyx-v7 .footer-links a:hover {
  color: #ffffff;
  padding-right: 4px;
}

.footer-onyx-v7 .footer-cta {
  display: inline-block;
  padding: 8px 22px;
  border-radius: 999px;
  border: none;
  font-size: 0.9rem;
  font-weight: 500;
  background: #2563eb;
  color: #fff;
  text-decoration: none;
  box-shadow: 0 8px 20px rgba(37, 99, 235, 0.4);
  transition: 0.3s ease;
}

.footer-onyx-v7 .footer-cta:hover {
  background: #3b82f6;
  transform: translateY(-2px);
  box-shadow: 0 10px 28px rgba(37, 99, 235, 0.6);
}

.footer-onyx-v7 .footer-social a {
  color: #aaaaaa;
  margin-left: 10px;
  font-size: 1.1rem;
  transition: 0.25s;
}

.footer-onyx-v7 .footer-social a:last-child {
  margin-left: 0;
}

.footer-onyx-v7 .footer-social a:hover {
  color: #ffffff;
}

.footer-onyx-v7 .footer-separator {
  border-color: #2b2b2b;
  opacity: 0.7;
}

.footer-onyx-v7 .footer-bottom-row {
  color: #999999;
}

.footer-onyx-v7 .footer-bottom-links a {
  color: #b0b0b0;
  text-decoration: none;
  margin: 0 4px;
  transition: 0.25s;
}

.footer-onyx-v7 .footer-bottom-links a:hover {
  color: #ffffff;
}

@media (max-width: 767.98px) {
  .hero {
    padding-top: 2.6rem;
    padding-bottom: 3rem;
    text-align: center;
  }

  .hero-title {
    font-size: 1.7rem;
  }

  .hero p {
    font-size: 0.95rem;
  }

  .hero-actions,
  .hero-stats {
    justify-content: center;
  }

  .footer-onyx-v7 .footer-actions {
    text-align: center !important;
  }

  .footer-onyx-v7 .footer-social a {
    margin: 0 6px;
  }
}
</style>
