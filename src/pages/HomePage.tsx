import React from 'react';
import { Hero } from '../components/Hero';
import { AboutSection } from '../components/AboutSection';
import { ServicesSection } from '../components/ServicesSection';
import { RehabProcess } from '../components/RehabProcess';
import { BranchesSection } from '../components/BranchesSection';
import { TeamSection } from '../components/TeamSection';
import { CharitySection } from '../components/CharitySection';
import { NewsSection } from '../components/NewsSection';
import { ReviewsSection } from '../components/ReviewsSection';
import { FaqSection } from '../components/FaqSection';
import { PartnersSection } from '../components/PartnersSection';
import { ContactSection } from '../components/ContactSection';
import { FadeIn } from '../components/FadeIn';

export const HomePage: React.FC = () => {
  return (
    <div className="space-y-0 overflow-hidden">
      <Hero />
      <FadeIn>
        <AboutSection />
      </FadeIn>
      <FadeIn>
        <ServicesSection />
      </FadeIn>
      <FadeIn>
        <RehabProcess />
      </FadeIn>
      <FadeIn>
        <BranchesSection />
      </FadeIn>
      <FadeIn>
        <TeamSection />
      </FadeIn>
      <FadeIn>
        <CharitySection />
      </FadeIn>
      <FadeIn>
        <NewsSection />
      </FadeIn>
      <FadeIn>
        <ReviewsSection />
      </FadeIn>
      <FadeIn>
        <FaqSection />
      </FadeIn>
      <FadeIn>
        <PartnersSection />
      </FadeIn>
      <FadeIn>
        <ContactSection />
      </FadeIn>
    </div>
  );
};
