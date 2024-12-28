"use client";

import { ChildrenInterface } from "@/lib/interfaces";

export default function Button({ children }: ChildrenInterface) {
	return <button className='button'>{children}</button>;
}
