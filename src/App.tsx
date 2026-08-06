import React from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { AccessibilityProvider } from './context/AccessibilityContext';
import { AccessibilityBar } from './components/AccessibilityBar';
import { Header } from './components/Header';
import { Footer } from './components/Footer';
import { ScrollToTop } from './components/ScrollToTop';
import { PageProgressBar } from './components/PageProgressBar';

import { HomePage } from './pages/HomePage';
import { AboutPage } from './pages/AboutPage';
import { ServicesPage } from './pages/ServicesPage';
import { ProcessPage } from './pages/ProcessPage';
import { BranchesPage } from './pages/BranchesPage';
import { TeamPage } from './pages/TeamPage';
import { UmayPage } from './pages/UmayPage';
import { CharityPage } from './pages/CharityPage';
import { DocumentsPage } from './pages/DocumentsPage';
import { NewsPage } from './pages/NewsPage';
import { FaqReviewsPage } from './pages/FaqReviewsPage';
import { ContactsPage } from './pages/ContactsPage';

import { EnrollmentModal } from './components/EnrollmentModal';
import { DonationModal } from './components/DonationModal';
import { ServiceDetailModal } from './components/ServiceDetailModal';

export function AppContent() {
  return (
    <div className="min-h-screen flex flex-col bg-white text-slate-900 font-sans antialiased selection:bg-emerald-500 selection:text-white">
      <PageProgressBar />
      <ScrollToTop />
      <AccessibilityBar />
      <Header />
      <main className="flex-1">
        <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="/about" element={<AboutPage />} />
          <Route path="/services" element={<ServicesPage />} />
          <Route path="/process" element={<ProcessPage />} />
          <Route path="/branches" element={<BranchesPage />} />
          <Route path="/team" element={<TeamPage />} />
          <Route path="/umay" element={<UmayPage />} />
          <Route path="/charity" element={<CharityPage />} />
          <Route path="/documents" element={<DocumentsPage />} />
          <Route path="/news" element={<NewsPage />} />
          <Route path="/reviews-faq" element={<FaqReviewsPage />} />
          <Route path="/contacts" element={<ContactsPage />} />
          <Route path="*" element={<HomePage />} />
        </Routes>
      </main>
      <Footer />

      {/* Global Modals */}
      <EnrollmentModal />
      <DonationModal />
      <ServiceDetailModal />
    </div>
  );
}

export function App() {
  return (
    <BrowserRouter basename={import.meta.env.BASE_URL}>
      <AccessibilityProvider>
        <AppContent />
      </AccessibilityProvider>
    </BrowserRouter>
  );
}

export default App;
