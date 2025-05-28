import { dataSponsored } from "@/dummy/section-home/sponsored";
import Image from "next/image";
import {
  Tooltip,
  TooltipContent,
  TooltipProvider,
  TooltipTrigger,
} from "@/components/ui/tooltip";

export default function SponsoredSection() {
  return (
    <div className="px-20 pt-10">
      <h1 className="font-semibold text-gray-700 text-center text-lg">
        Sponsored by
      </h1>
      <div className="flex items-center gap-10 justify-center mt-5">
        <TooltipProvider>
          {dataSponsored.map((item) => (
            <Tooltip key={item.name}>
              <TooltipTrigger asChild>
                <Image
                  src={item.logo}
                  alt={item.name}
                  width={60}
                  height={60}
                  className="opacity-70 hover:opacity-100 transition"
                />
              </TooltipTrigger>
              <TooltipContent>
                <p>{item.name}</p>
              </TooltipContent>
            </Tooltip>
          ))}
        </TooltipProvider>
      </div>
    </div>
  );
}
