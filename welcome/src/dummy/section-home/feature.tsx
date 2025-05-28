import type { featureDataTypes } from "@/types/section-home/index";
import {
  IconBriefcase,
  IconAlarm,
  IconPresentation,
  IconTrendingUp,
  IconPuzzleOff,
  IconCoin,
} from "@tabler/icons-react";

export const dataFeature: featureDataTypes[] = [
  {
    id: 1,
    name: "Easy Work Management",
    logo: <IconBriefcase stroke={2} color="white" />,
    description:
      "In TaskFlow, you can cretae & manage your project as you need. Organize, collaborate with your team & invite other people to your company.",
  },
  {
    id: 2,
    name: "Save time with automations",
    logo: <IconAlarm stroke={2} color="white" />,
    description:
      "Automate all those routine tasks with unlimited automation recipes, like email reminders or project approval requests. Increase your productivity and creativity by freeing up time.",
  },
  {
    id: 3,
    name: "Monitor work progress",
    logo: <IconPresentation stroke={2} color="white" />,
    description:
      "Here you can also monitor all your team's performance and see reports with different time frames. You cann also see them all with beutiful graphic & stats so you won't get bored of looking at it",
  },
  {
    id: 4,
    name: "Make all your work goes faster",
    logo: <IconTrendingUp stroke={2} color="white"/>,
    description:
      "With this tools, you will be able to more easily organize your work and get it done faster!",
  },
  {
    id: 5,
    name: "Make something Difficult Easy!",
    logo: <IconPuzzleOff stroke={2} color="white" />,
    description:
      "If you have so many project, dizzy organizing your own team, among other things. here everything is structured and made as easy as possible for you to organize and monitor the work of your team.",
  },
  {
    id: 6,
    name: "Best Part!",
    logo: <IconCoin stroke={2} color="white" />,
    description:
      "Do I have to pay to use this tool? No, it's completely free! You'll be able to access many cool features here but with certain limitations.",
  },
];
