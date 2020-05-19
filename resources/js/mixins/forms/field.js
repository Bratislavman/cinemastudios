import {fieldContainer} from "./fieldContainer";
import FieldContainer from "../../components/general/Form/FieldContainer";

export const field = {
    props: ['validator'],
    mixins: [fieldContainer],
    components: {FieldContainer}
}
