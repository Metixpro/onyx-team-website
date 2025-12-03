<script setup>
import { computed } from "vue";
import { useRoute, useRouter } from "vue-router";
import { teamMembers } from "../data/teamMembers";

const route = useRoute();
const router = useRouter();

const member = computed(() => teamMembers.find((m) => m.slug === route.params.slug));

const goBack = () => {
  router.push("/#team");
};
</script>

<template>
  <main class="section fancy-section member-page">
    <div class="container" v-if="member">
      <div class="resume-shell">
        <header class="resume-header">
          <div class="resume-header-top">
            <button class="back-link" type="button" @click="goBack">
              <i class="fa-solid fa-arrow-right-long"></i>
              <span>بازگشت به اعضای تیم</span>
            </button>

            <span class="resume-chip"> پروفایل عضو تیم انیکس </span>
          </div>

          <div class="resume-header-main">
            <h1 class="resume-name">
              {{ member.name }}
            </h1>

            <p class="resume-role">
              {{ member.role }}
            </p>

            <p class="resume-bio-short">
              {{ member.bio }}
            </p>

            <div class="resume-header-meta">
              <span class="header-tag">عضو تیم Onyx</span>
              <span class="header-tag header-tag-soft">همکاری در پروژه‌های مختلف</span>
            </div>
          </div>
        </header>
        <div class="member-layout">
          <section class="resume-main" aria-label="جزئیات رزومه">
            <article class="resume-card resume-intro">
              <h2 class="resume-section-title">معرفی</h2>
              <p>
                {{ member.bio }}
              </p>
            </article>

            <div class="resume-columns">
              <article class="resume-card" aria-label="مهارت‌های کلیدی">
                <h2 class="resume-section-title">مهارت‌ها</h2>
                <div class="skills-grid">
                  <span v-for="skill in member.skills" :key="skill" class="skill-badge">
                    {{ skill }}
                  </span>
                </div>
              </article>

              <article class="resume-card" aria-label="تجربیات کاری">
                <h2 class="resume-section-title">تجربیات کاری</h2>
                <ul class="experience-list">
                  <li
                    v-for="(exp, index) in member.experiences"
                    :key="index"
                    class="experience-item"
                  >
                    <div class="bullet"></div>
                    <div class="exp-content">
                      <p class="exp-text">
                        {{ exp }}
                      </p>
                    </div>
                  </li>
                </ul>
              </article>
            </div>

            <article
              class="resume-card resume-extra"
              v-if="member.projects && member.projects.length"
              aria-label="پروژه‌ها و همکاری‌ها"
            >
              <h2 class="resume-section-title">پروژه‌ها و همکاری‌ها</h2>

              <div class="project-grid">
                <div class="project-item" v-for="(project, index) in member.projects" :key="index">
                  <h3 class="project-title">
                    {{ project.title }}
                  </h3>

                  <p class="project-desc">
                    {{ project.description }}
                  </p>

                  <a
                    v-if="project.link"
                    class="project-link"
                    :href="project.link"
                    target="_blank"
                    rel="noopener"
                  >
                    مشاهده پروژه
                    <i class="fa-solid fa-arrow-up-left-from-square"></i>
                  </a>
                </div>
              </div>
            </article>
          </section>
          <aside class="resume-sidebar" aria-label="پروفایل و وضعیت">
            <section class="resume-card resume-profile">
              <h2 class="resume-section-title sidebar-title">پروفایل</h2>

              <div class="sidebar-avatar">
                <div class="avatar-glow">
                  <div class="avatar-wrapper">
                    <img :src="member.avatar" :alt="member.name" />
                  </div>
                </div>
              </div>

              <h3 class="profile-name">
                {{ member.name }}
              </h3>
              <p class="profile-role">
                {{ member.role }}
              </p>

              <div class="resume-meta">
                <div class="meta-item">
                  <span class="meta-label">تیم</span>
                  <span class="meta-value">Onyx Team</span>
                </div>
                <div class="meta-item">
                  <span class="meta-label">وضعیت</span>
                  <span class="meta-value online-dot">فعال</span>
                </div>
              </div>
            </section>
          </aside>
        </div>
      </div>
    </div>

    <div class="container" v-else>
      <div class="resume-card not-found text-center">
        <h3 class="mb-3">عضوی با این مشخصات پیدا نشد.</h3>
        <router-link class="btn btn-outline-custom" to="/#team"> بازگشت به اعضای تیم </router-link>
      </div>
    </div>
  </main>
</template>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;600;700;800&display=swap");

.member-page {
  direction: rtl;
  text-align: right;
  font-family: "Vazirmatn", system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
  padding-top: 3rem;
}

.resume-shell {
  max-width: 960px;
  margin: 0 auto;
}

.resume-header {
  background: #020617;
  border-radius: 1.2rem;
  padding: 1.3rem 1.4rem 1.4rem;
  margin-bottom: 2rem;
  border: 1px solid #1f2937;
  box-shadow: 0 10px 26px rgba(15, 23, 42, 0.85);
}

.resume-header-top {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 1rem;
}

.back-link {
  display: inline-flex;
  align-items: center;
  gap: 0.35rem;
  background: transparent;
  border: none;
  padding: 0;
  font-size: 0.85rem;
  color: #9ca3af;
  cursor: pointer;
}

.back-link i {
  font-size: 0.85rem;
}

.back-link:hover {
  color: #e5e7eb;
}

.resume-chip {
  display: inline-block;
  font-size: 0.78rem;
  padding: 4px 10px;
  border-radius: 999px;
  background: #0b1120;
  color: #cbd5f5;
  border: 1px solid #1e293b;
}

.resume-header-main {
  margin-top: 0.9rem;
}

.resume-name {
  font-size: 1.8rem;
  font-weight: 800;
  color: #f9fafb;
  margin: 0 0 0.25rem;
}

.resume-role {
  font-size: 0.95rem;
  color: #cbd5f5;
  margin-bottom: 0.6rem;
}

.resume-bio-short {
  margin-top: 0.3rem;
  margin-bottom: 0.7rem;
  max-width: 640px;
  color: #e5e7eb;
  line-height: 1.8;
}

.resume-header-meta {
  display: flex;
  flex-wrap: wrap;
  gap: 0.4rem;
  margin-top: 0.3rem;
}

.header-tag {
  display: inline-block;
  font-size: 0.8rem;
  padding: 3px 9px;
  border-radius: 999px;
  background: #0b1120;
  border: 1px solid #1f2937;
  color: #e5e7eb;
}

.header-tag-soft {
  background: #020617;
  color: #cbd5f5;
}

.member-layout {
  display: grid;
  grid-template-columns: minmax(0, 3fr) minmax(0, 1.6fr);
  gap: 1.5rem;
  align-items: flex-start;
}

.resume-card {
  background: #020617;
  border-radius: 1rem;
  border: 1px solid #1f2937;
  padding: 1.2rem 1.3rem;
  box-shadow: 0 8px 22px rgba(15, 23, 42, 0.9);
}
.resume-sidebar {
  position: sticky;
  top: 88px;
}

.sidebar-title {
  margin-bottom: 0.8rem;
}

.sidebar-avatar {
  display: flex;
  justify-content: center;
  margin-bottom: 0.5rem;
}

.avatar-glow {
  padding: 3px;
  border-radius: 999px;
  background: radial-gradient(circle at top, rgba(56, 189, 248, 0.9), transparent 60%);
  display: inline-block;
}

.avatar-wrapper {
  width: 130px;
  height: 130px;
}

.avatar-wrapper img {
  width: 100%;
  height: 100%;
  border-radius: 999px;
  object-fit: cover;
  display: block;
}

.profile-name {
  margin-top: 0.7rem;
  margin-bottom: 0.1rem;
  font-weight: 700;
  color: #f9fafb;
  font-size: 1.02rem;
  text-align: center;
}

.profile-role {
  font-size: 0.88rem;
  color: #9ca3af;
  text-align: center;
}

.resume-meta {
  margin-top: 1.2rem;
  display: grid;
  gap: 0.55rem;
}

.meta-item {
  display: flex;
  justify-content: space-between;
  font-size: 0.86rem;
}

.meta-label {
  color: #9ca3af;
}

.meta-value {
  color: #e5e7eb;
  font-weight: 500;
}

.online-dot::before {
  content: "";
  display: inline-block;
  width: 7px;
  height: 7px;
  border-radius: 50%;
  margin-left: 6px;
  background: #22c55e;
}

.resume-main {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.resume-section-title {
  font-size: 0.98rem;
  font-weight: 700;
  margin-bottom: 0.6rem;
  color: #e5e7eb;
}

.resume-intro p {
  margin: 0;
  color: #d1d5db;
  line-height: 1.9;
}

.resume-columns {
  display: grid;
  grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
  gap: 1rem;
}

/* مهارت‌ها */
.skills-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 0.45rem;
}

.skill-badge {
  display: inline-block;
  padding: 4px 10px;
  border-radius: 999px;
  font-size: 0.78rem;
  background: #020617;
  border: 1px solid #1e293b;
  color: #e5f3ff;
}

/* تجربیات */
.experience-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.experience-item {
  display: flex;
  align-items: flex-start;
  gap: 0.5rem;
  margin-bottom: 0.45rem;
  font-size: 0.9rem;
}

.experience-item:last-child {
  margin-bottom: 0;
}

.experience-item .bullet {
  margin-top: 0.45rem;
  width: 8px;
  height: 8px;
  border-radius: 999px;
  background: #38bdf8;
}

.exp-text {
  margin: 0;
  color: #d1d5db;
}

/* پروژه‌ها */
.project-grid {
  display: grid;
  gap: 0.9rem;
}

.project-item {
  background: #020617;
  padding: 0.9rem 1rem;
  border-radius: 0.9rem;
  border: 1px solid #1f2937;
}

.project-title {
  color: #e5e7eb;
  font-size: 0.96rem;
  font-weight: 700;
  margin-bottom: 0.35rem;
}

.project-desc {
  color: #9ca3af;
  font-size: 0.85rem;
  line-height: 1.7;
  margin-bottom: 0.4rem;
}

.project-link {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 0.82rem;
  color: #7dd3fc;
  text-decoration: none;
}

.not-found {
  max-width: 480px;
  margin: 3rem auto 0;
}

@media (max-width: 991.98px) {
  .member-layout {
    grid-template-columns: minmax(0, 1fr);
  }

  .resume-sidebar {
    position: static;
  }

  .resume-bio-short {
    max-width: 100%;
  }
}

@media (max-width: 767.98px) {
  .resume-header {
    padding: 1.1rem 1rem 1.2rem;
  }

  .resume-header-top {
    flex-direction: row-reverse;
    justify-content: space-between;
  }

  .resume-name {
    font-size: 1.5rem;
  }

  .resume-shell {
    padding-inline: 0.2rem;
  }

  .member-layout {
    gap: 1rem;
  }

  .resume-columns {
    grid-template-columns: minmax(0, 1fr);
  }

  .resume-card {
    padding: 1rem 1rem;
  }

  .avatar-wrapper {
    width: 120px;
    height: 120px;
  }
}
</style>
