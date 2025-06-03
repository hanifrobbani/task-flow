"use client";
import type { ReactNode } from "react";
import Navbar from "../shared/navbar";
import Footer from "../shared/footer";

interface PageLayoutProps {
  children: ReactNode;
}

export default function MainLayout({ children }: PageLayoutProps) {
  return (
    <>
      <Navbar />
      {children}
      <Footer />
    </>
  );
}
