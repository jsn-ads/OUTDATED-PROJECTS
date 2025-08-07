import { StatusBar } from "react-native";
import { SafeAreaView } from "react-native";
import { TvItem } from "./components/TvItem";

const twoThreeApp = () =>
{
  return(
    <SafeAreaView>
    {/* Utilizado para Android : Pois SafeAreaView não resolve o problema de margin-top */}
    <StatusBar barStyle="light-content"backgroundColor="#FFF"/>
      <TvItem/>
    </SafeAreaView>
  );
}

export default twoThreeApp