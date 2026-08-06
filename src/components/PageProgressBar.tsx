import React, { useState, useEffect, useRef } from 'react';
import { useLocation } from 'react-router-dom';
import { useAccessibility } from '../context/AccessibilityContext';

export const PageProgressBar: React.FC = () => {
  const location = useLocation();
  const { isImpairedMode } = useAccessibility();
  const [progress, setProgress] = useState(0);
  const [visible, setVisible] = useState(false);
  const prevLocationRef = useRef(location.pathname + location.search);

  useEffect(() => {
    const currentLoc = location.pathname + location.search;
    
    // Only trigger progress on route change
    if (prevLocationRef.current !== currentLoc) {
      prevLocationRef.current = currentLoc;
      
      // Start progress
      setVisible(true);
      setProgress(20);

      const timer1 = setTimeout(() => {
        setProgress(65);
      }, 100);

      const timer2 = setTimeout(() => {
        setProgress(90);
      }, 250);

      const timer3 = setTimeout(() => {
        setProgress(100);
      }, 400);

      const timer4 = setTimeout(() => {
        setVisible(false);
        setTimeout(() => setProgress(0), 200);
      }, 650);

      return () => {
        clearTimeout(timer1);
        clearTimeout(timer2);
        clearTimeout(timer3);
        clearTimeout(timer4);
      };
    }
  }, [location]);

  if (!visible && progress === 0) return null;

  return (
    <div
      aria-hidden="true"
      className="fixed top-0 left-0 right-0 z-[9999] pointer-events-none transition-opacity duration-300"
      style={{ opacity: visible ? 1 : 0 }}
    >
      <div
        className={`w-full transition-all duration-300 ease-out relative ${
          isImpairedMode
            ? 'h-2 bg-amber-400 shadow-md shadow-amber-400/50'
            : 'h-1 bg-gradient-to-r from-emerald-600 via-emerald-400 to-teal-300 shadow-[0_0_12px_rgba(16,185,129,0.8)]'
        }`}
        style={{ width: `${progress}%` }}
      >
        {/* Glow tip at the end of progress bar */}
        <div
          className={`absolute top-0 right-0 bottom-0 w-8 transform translate-x-1/2 ${
            isImpairedMode
              ? 'bg-amber-200 blur-xs'
              : 'bg-white/80 blur-xs'
          }`}
        />
      </div>
    </div>
  );
};
