import { HeroSection } from "./components/hero-section";
import { Navbar } from "../../shared/navbar";

export default function HomeLayout() {
  return (
    <>
      <Navbar></Navbar>
      <HeroSection></HeroSection>
    </>
  );
}
