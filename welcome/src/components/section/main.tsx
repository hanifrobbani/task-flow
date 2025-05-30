"use client"
import Navbar from "../shared/navbar";
import Footer from "../shared/footer";
import HomeLayout from "./home/layout";
export default function MainLayout() {
  return (
    <>
      <Navbar />
      <HomeLayout />
      <Footer />
    </>
  );
}
