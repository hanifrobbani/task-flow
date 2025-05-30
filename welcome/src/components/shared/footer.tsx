import { useState, useEffect } from "react";

export default function Footer() {
  const [currentDate, setCurrentDate] = useState("");

  useEffect(() => {
    const date = new Date();
    const year = date.getFullYear();
    const formattedDate = year.toString();
    setCurrentDate(formattedDate);
  }, []);

  return (
    <footer className="flex justify-between py-10 px-20">
      <div className="w-full text-gray-600 text-sm">
        <p>&copy; {currentDate} TaskFlow, All right reserved</p>
      </div>
      <div className="w-full flex gap-4 justify-end text-gray-600 text-sm">
        <p>Terms of Service</p>
        <p>Policy Service</p>
        <p>Contact Us</p>
      </div>
    </footer>
  );
}
