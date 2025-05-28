import { JSX } from "react";

export interface sponsoredDataTypes {
    id: number,
    name: string,
    logo: string,
}[];

export interface featureDataTypes {
    id: number,
    name: string,
    logo: JSX.Element,
    description: string,
}
