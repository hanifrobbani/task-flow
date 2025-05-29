import { Navbar } from "../shared/navbar";
import HomeLayout from "./home/layout";
export default function MainLayout() {
  return (
    <>
      <Navbar />
      <HomeLayout />
    </>
  );
}
