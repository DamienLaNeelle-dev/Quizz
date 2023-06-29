import React from "react";
import { createRoot } from "react-dom/client";
import Questions_Lv1 from "./components/Questions_Lv1";
import Questions_Lv2 from "./components/Questions_Lv2";
import Questions_Lv3 from "./components/Questions_Lv3";

const rootLv1 = document.getElementById("lvl1");

if (rootLv1 !== null) {
  createRoot(rootLv1).render(<Questions_Lv1 />);
}

const rootLv2 = document.getElementById("lvl2");

if (rootLv2 !== null) {
  createRoot(rootLv2).render(<Questions_Lv2 />);
}

const rootLv3 = document.getElementById("lvl3");

if (rootLv3 !== null) {
  createRoot(rootLv3).render(<Questions_Lv3 />);
}
